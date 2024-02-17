<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentRequest;
use App\Models\CDocument;
use App\Models\CUser;
use App\Services\DocumentService;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class DocumentController extends Controller
{

    public function __construct()
    {

    }

    public function list(Request $request)
    {
        $user = $request->user();

        $documents = CDocument::whereHas('users', function (Builder $query) use ($user) {
            $query->where('cusers.id', $user->id);
        })->get();

        return view('home', compact('user', 'documents'));
    }

    public function show(CDocument $document, Request $request)
    {
        return view('show_document', compact('document'));
    }

    public function createView()
    {
        $document = new CDocument();
        $document->name = '';
        $document->content = '';
        $isCreate = true;
        return view('edit_document', compact('document', 'isCreate'));
    }

    public function create(DocumentRequest $request, DocumentService $documentService)
    {
        $documentService->create($request->user(), $request->name, $request->content);


        return redirect()->route('home');
    }

    public function editView(CDocument $document)
    {
        $isCreate = false;
        return view('edit_document', compact('document', 'isCreate'));
    }

    public function edit(CDocument $document, DocumentRequest $request, DocumentService $documentService)
    {
        $documentService->update($document, $request->name, $request->content);

        return redirect()->route('home');
    }

    public function shareView(CDocument $document)
    {
        $users = CUser::get();
        return view('share', compact('document', 'users'));
    }

    public function share(CDocument $document, Request $request, DocumentService $documentService)
    {
        $userIds = $request->get('user_ids', []);
        $documentService->share($document, $userIds);

        return redirect()->route('home');
    }








}
