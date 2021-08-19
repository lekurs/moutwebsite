<?php


namespace App\Http\Controllers\Admin;


use App\Models\Project;
use App\Repository\PageRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePage;
use Illuminate\Contracts\View\View;

class PageController extends Controller
{
    private PageRepository $pageRepository;

    /**
     * PageController constructor.
     * @param PageRepository $pageRepository
     */
    public function __construct(PageRepository $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }

    public function index()
    {

    }

    public function show()
    {

    }

    public function create(Project $project): View
    {
        return \view('pages.admin.recipes.pages.create', [
            'project' => $project,
        ]);
    }

    public function store(Project $project, StorePage $storePage)
    {
        $data = $storePage->validated();

        $this->pageRepository->store($data, $project);

        return redirect()->route('clients.show', $project->client->slug);
    }

    public function destroy()
    {

    }

    public function edit()
    {

    }

    public function update()
    {

    }
}
