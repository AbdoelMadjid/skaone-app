<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use App\Models\Channel;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currentUserId = auth()->id();

        // Daftar chat dengan pengguna lain
        $chats = Chat::where('user_id', $currentUserId)
            ->orWhere('recipient_id', $currentUserId)
            ->with(['user', 'recipient'])
            ->orderBy('last_message_at', 'desc')
            ->get();

        // Daftar semua partner chat
        $chatPartners = $chats->map(function ($chat) use ($currentUserId) {
            // Tentukan partner chat berdasarkan user_id dan recipient_id
            return $chat->user_id == $currentUserId ? $chat->recipient : $chat->user;
        })->unique('id'); // Hilangkan duplikat berdasarkan ID pengguna

        // Menghitung pesan yang belum dibaca untuk setiap partner chat
        $chatPartners->each(function ($partner) use ($currentUserId) {
            $partner->messagecount = Chat::where('user_id', $partner->id)
                ->where('recipient_id', $currentUserId)
                ->where('read', 0)
                ->count();
        });

        // Tentukan pengguna yang sedang diajak chat (chat partner terakhir)
        $chatPartner = null;

        if ($chats->isNotEmpty()) {
            // Ambil percakapan terakhir
            $lastChat = $chats->first();

            // Tentukan lawan chat berdasarkan percakapan terakhir
            $chatPartner = $lastChat->user_id == $currentUserId
                ? $lastChat->recipient
                : $lastChat->user;

            // Menghitung pesan yang belum dibaca oleh chat partner terakhir
            $chatPartner->messagecount = Chat::where('user_id', $chatPartner->id)
                ->where('recipient_id', $currentUserId)
                ->where('read', 0)
                ->count();
        }

        // Menghitung pesan yang belum dibaca pada setiap percakapan
        $chats->each(function ($chat) use ($currentUserId) {
            if ($chat->user_id == $currentUserId) {
                // Menghitung pesan yang belum dibaca oleh penerima
                $chat->messagecount = Chat::where('user_id', $chat->recipient->id)
                    ->where('recipient_id', $currentUserId)
                    ->where('read', 0)
                    ->count();
            } else {
                // Menghitung pesan yang belum dibaca oleh pengirim
                $chat->messagecount = Chat::where('user_id', $chat->user->id)
                    ->where('recipient_id', $currentUserId)
                    ->where('read', 0)
                    ->count();
            }
        });

        // Daftar grup
        //$channels = Channel::with('user', 'users')->get();
        $channels = Channel::with('user', 'users')
            ->where('creator_id', $currentUserId) // Channel yang dibuat oleh user
            ->orWhereHas('users', function ($query) use ($currentUserId) {
                $query->where('user_id', $currentUserId); // Channel yang diikuti oleh user
            })
            ->get();

        $contacts = User::where('id', '!=', $currentUserId)
            ->orderBy('name') // Urutkan data berdasarkan nama
            ->get()
            ->groupBy(function ($contact) {
                // Kelompokkan berdasarkan huruf pertama nama yang sudah dikapitalisasi
                return strtoupper(substr($contact->name, 0, 1)); // Kelompokkan berdasarkan huruf pertama
            })
            ->map(function ($group) {
                // Gunakan ucwords untuk memastikan nama diubah ke format 'John Doe' meskipun di database 'JOHN DOE'
                return $group->map(function ($contact) {
                    $contact->name = ucwords(strtolower($contact->name)); // Format nama menjadi 'John Doe'
                    return $contact;
                });
            });

        return view('pages.pengguna.pesan-pengguna', compact('chats', 'channels', 'contacts', 'chatPartner', 'chatPartners'));
    }

    // Controller
    public function getChatMessages($id)
    {
        $loggedInUserId = auth()->id();

        // Mengambil pesan antara pengguna yang login dengan partner chat
        $messages = Chat::where(function ($query) use ($loggedInUserId, $id) {
            $query->where('user_id', $loggedInUserId)
                ->where('recipient_id', $id);
        })->orWhere(function ($query) use ($loggedInUserId, $id) {
            $query->where('user_id', $id)
                ->where('recipient_id', $loggedInUserId);
        })
            ->with(['user:id,name', 'recipient:id,name'])
            ->orderBy('last_message_at', 'desc')  // Urutkan berdasarkan waktu
            ->get();

        return response()->json([
            'messages' => $messages->map(function ($message) use ($loggedInUserId) {
                return [
                    'id' => $message->id,
                    'sender_id' => $message->user_id,
                    'sender_name' => $message->user_id == $loggedInUserId ? 'You' : $message->user->name,
                    'last_message' => $message->last_message,
                    'last_message_at' => $message->last_message_at,
                ];
            }),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
