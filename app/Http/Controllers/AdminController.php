<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ProductRequest;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function dashboard()
    {
        // Estatísticas gerais
        $totalUsers = User::count();
        $activeOrders = ProductRequest::whereNotIn('status', ['cancelled', 'completed'])->count();
        $pendingRequests = ProductRequest::where('status', 'pending')->count();
        $reportedIssues = 3; // Substitua pelo número real se houver uma tabela de suporte

        // Buscar vendedores aguardando aprovação
        $pendingSellers = User::where('is_contributor', true)
            ->where('is_approved', false)
            ->get();

        return view('pages.admin.dashboard', compact(
            'totalUsers',
            'activeOrders',
            'pendingRequests',
            'reportedIssues',
            'pendingSellers'
        ));
    }

    public function approveSeller($id)
    {
        $seller = User::where('id', $id)
            ->where('is_contributor', true)
            ->where('is_approved', false)
            ->firstOrFail();

        $seller->update(['is_approved' => true]);

        return redirect()->route('admin.dashboard')->with('success', 'Vendedor aprovado com sucesso!');
    }

    public function rejectSeller($id)
    {
        $seller = User::where('id', $id)
            ->where('is_contributor', true)
            ->where('is_approved', false)
            ->firstOrFail();

        $seller->delete(); // Remove o vendedor do sistema

        return redirect()->route('admin.dashboard')->with('error', 'Vendedor rejeitado e removido.');
    }
}
