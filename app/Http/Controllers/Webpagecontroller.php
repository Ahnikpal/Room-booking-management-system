<?php

namespace App\Http\Controllers;

use App\Models\Webpage; // Import the Webpage model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class WebpageController extends Controller
{
    public function index()
    {
        $data = WebPage::where('status', 1)->get();
        return view('AdminDashboard.WebPage.index', ['data' => $data]);
    }

    public function add()
    {
        return view('AdminDashboard.WebPage.addEdit');
    }

    public function save(Request $request)
    {
        $webpage = new Webpage();
        $webpage->name = $request->input('page_name');
        $webpage->slug = $request->input('page_slug');
        $webpage->html = $request->input('page_content');
        $webpage->status = $request->input('page_status');
        $webpage->created_by = Auth::id(); // ✅ This line sets the current user's ID
        $webpage->save();
    
        return redirect()->route('webpage.list')->with('success', 'Page created successfully');
    }
    
    public function edit($id){
        $data = WebPage::find($id);
        return view('AdminDashboard.WebPage.addEdit',['data'=>$data]);
    }
    public function update(Request $request, $id)
   {
    $page = WebPage::find($id);  // Fixed: Added the $id parameter
    if (!$page) {
        return redirect()->back()->with('error', 'Page not found');
    }
    
    $page->name = $request->get('page_name');
    $page->slug = $request->get('page_slug');
    $page->html = $request->get('page_content');
    $page->status = $request->get('page_status');
    $page->updated_by = Auth::user()->id;
    $page->save();
    
    return redirect()->route('webpage.index')->with('success', 'Page updated successfully');
}

    public function viewDelete($id)
    {
        return view('AdminDashboard.WebPage.delete');
    }

    public function delete($id)
    {
        WebPage::where('id', $id)->delete();
        return redirect()->route('webpage.index');
    }
    // This method handles the landing page where all webpages are listed
    public function landing()
{
    $pages = Webpage::all(); 

    // Temporary hardcoded team data (you can make this dynamic later)
    $team = [
        [
            'name' => 'John Doe',
            'role' => 'Manager',
            'bio'  => 'Experienced in hotel operations.'
        ],
        [
            'name' => 'Jane Smith',
            'role' => 'Receptionist',
            'bio'  => 'Welcomes guests with a smile.'
        ],
        [
            'name' => 'David Lee',
            'role' => 'Chef',
            'bio'  => 'Creates delicious menus.'
        ],
    ];

    return view('index', compact('pages', 'team'));
}


    // This method retrieves a specific page based on the slug
    public function viewPage($page)
    {
        $data = Webpage::where('slug', $page)->first();
        $pages = Webpage::all(); // 👈 Add this line to get all pages for the navbar
    
        if (!$data) {
            abort(404); // Optional: handle page not found
        }
    
        return view('dynamic', ['data' => $data, 'pages' => $pages]);
    }
    
}
