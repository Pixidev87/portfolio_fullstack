<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Models\Message;
use Illuminate\Http\JsonResponse;


class MessageController extends Controller
{
    # ADMIN: Az összes üzenet megtekintése a backend admin felületén.
    public function index(): JsonResponse
    {
        # Az összes üzenet lekérése az adatbázisból, legújabbak elöl.
        $message = Message::latest()->get();
        # Visszaadjuk az üzeneteket JSON formátumban a frontendnek.
        return response()->json($message);
    }

    # PUBLIKUS: Új üzenet fogadása a frontendről, validációval.
    public function store(StoreMessageRequest $request)
    {
        # A StoreMessageRequest automatikusan elvégzi a validációt, így itt már csak a validált adatokat használjuk az új üzenet létrehozásához.
        Message::create($request->validated());
        # Visszaadunk egy JSON választ, hogy az üzenet sikeresen létre lett hozva. A HTTP státuszkód 201 Created.
        return response()->json([
            'status' => 'success',
            'message' => 'Üzenet fogadva, hamarosan válaszolok'
        ], 201);
    }

    # ADMIN: Egy üzenet olvasottá jelölése (is_read true-ra állítása).
    public function update(Message $message)
    {
        $message->update(['is_read' => true]);
        return response()->json(['status' => 'updated']);
    }
}
