<?php

namespace App\Services;

use App\Models\CDocument;
use App\Models\CHistory;
use App\Models\CUser;
use App\Notifications\DocumentShared;
use App\Notifications\UpdateDocument;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;

class DocumentService
{
    public function create(CUser $user, string $name, string $content)
    {
        $doc = new CDocument();

        $doc->name = $name;
        $doc->content = $content;

        $doc->save();

        $doc->users()->attach($user);
    }

    public function update(CDocument $document, $name, $content)
    {

        $history = new CHistory();

        $history->name = $document->name;
        $history->content = $document->content;
        $history->document_id = $document->id;

        $history->save();

        $document->name = $name;
        $document->content = $content;

        $document->save();

       Notification::send($document->users, new UpdateDocument($document->id, $document->name, $document->content));
    }

    public function share(CDocument $document, array $userIds)
    {
        $newUsers = [];
        foreach ($userIds as $userId) {
            $user = CUser::find($userId);
            if ($user) {
                if(!$document->users->contains($user->id)) {
                    $newUsers[] = $document;
                }
            }
        }
        $document->users()->sync($userIds);

        $document->save();

        Notification::send($newUsers, new DocumentShared($document->id, $document->name, $document->content));
    }
}
