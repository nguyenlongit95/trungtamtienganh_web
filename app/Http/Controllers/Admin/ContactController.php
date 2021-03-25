<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Repositories\Contact\ContactRepositoryInterface;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private $contactRepository;

    public function __construct(ContactRepositoryInterface $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = $this->contactRepository->getAll(config('const.paginate'), 'DESC');

        return view('admin.pages.contact.index', compact('contacts'));
    }

    /**
     * Controller search contact using name or email
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function search(Request $request)
    {
        $param = $request->all();
        $contacts = $this->contactRepository->search($param);

        return view('admin.pages.contact.index', compact('contacts'));
    }
}
