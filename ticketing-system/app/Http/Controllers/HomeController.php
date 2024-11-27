<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ticket;
use App\Models\TicketAudit;
use App\Models\Package;
use App\Models\Cafe;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    private function calculateTrend($currentCount, $previousCount)
    {
        if ($previousCount == 0) {
            return 0;
        }
        return round((($currentCount - $previousCount) / $previousCount) * 100);
    }

    public function index()
    {
        // Current period counts
        $currentActiveTickets = Ticket::where('status', 'active')->count();
        $currentTicketsUsed = TicketAudit::where('status', 'used')
            ->where('created_at', '>=', Carbon::now()->startOfMonth())
            ->count();
        $currentUsers = User::where('created_at', '>=', Carbon::now()->startOfMonth())->count();
        $currentPackagesBought = Ticket::where('created_at', '>=', Carbon::now()->startOfMonth())
            ->distinct('package_id')
            ->count();

        // Previous period counts
        $previousActiveTickets = Ticket::where('status', 'active')
            ->where('created_at', '<', Carbon::now()->startOfMonth())
            ->where('created_at', '>=', Carbon::now()->subMonths(1)->startOfMonth())
            ->count();
        $previousTicketsUsed = TicketAudit::where('status', 'used')
            ->where('created_at', '<', Carbon::now()->startOfMonth())
            ->where('created_at', '>=', Carbon::now()->subMonths(1)->startOfMonth())
            ->count();
        $previousUsers = User::where('created_at', '<', Carbon::now()->startOfMonth())
            ->where('created_at', '>=', Carbon::now()->subMonths(1)->startOfMonth())
            ->count();
        $previousPackagesBought = Ticket::where('created_at', '<', Carbon::now()->startOfMonth())
            ->where('created_at', '>=', Carbon::now()->subMonths(1)->startOfMonth())
            ->distinct('package_id')
            ->count();

        // Calculate trends
        $activeTicketsTrend = $this->calculateTrend($currentActiveTickets, $previousActiveTickets);
        $ticketsUsedTrend = $this->calculateTrend($currentTicketsUsed, $previousTicketsUsed);
        $usersTrend = $this->calculateTrend($currentUsers, $previousUsers);
        $packagesBoughtTrend = $this->calculateTrend($currentPackagesBought, $previousPackagesBought);

        // Get ticket usage data for the last 7 days
        $ticketUsageData = TicketAudit::where('created_at', '>=', Carbon::now()->subDays(7))
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as count'))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Get popular visit times data
        $visitTimesData = TicketAudit::where('created_at', '>=', Carbon::now()->subDays(30))
            ->select(DB::raw('EXTRACT(HOUR FROM created_at) as hour'), DB::raw('COUNT(*) as count'))
            ->groupBy(DB::raw('EXTRACT(HOUR FROM created_at)'))
            ->orderBy('hour')
            ->get();

        // Get recent activities
        $recentActivities = TicketAudit::with(['cafe', 'ticket'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get()
            ->map(function ($activity) {
                return [
                    'title' => "Cafe Visit - {$activity->cafe->name}",
                    'time' => $activity->created_at->diffForHumans(),
                    'status' => ucfirst($activity->status)
                ];
            });

        $chartData = [
            'ticket_usage' => [
                'data' => $ticketUsageData->pluck('count')->toArray(),
                'categories' => $ticketUsageData->pluck('date')->map(function ($date) {
                    return Carbon::parse($date)->format('D');
                })->toArray(),
            ],
            'visit_times' => [
                'data' => $visitTimesData->pluck('count')->toArray(),
                'categories' => $visitTimesData->pluck('hour')->map(function ($hour) {
                    return Carbon::createFromTime($hour)->format('gA');
                })->toArray(),
            ],
        ];
        
        $data = [
            'stats' => [
                'active_tickets' => [
                    'value' => $currentActiveTickets,
                    'trend' => $activeTicketsTrend,
                ],
                'tickets_used' => [
                    'value' => $currentTicketsUsed,
                    'trend' => $ticketsUsedTrend,
                ],
                'total_users' => [
                    'value' => User::count(),
                    'trend' => $usersTrend,
                ],
                'packages_bought' => [
                    'value' => $currentPackagesBought,
                    'trend' => $packagesBoughtTrend,
                ],
            ],
            'charts' => $chartData,
            'recent_activities' => $recentActivities,
        ];

        return view('home', $data);
    }
}
