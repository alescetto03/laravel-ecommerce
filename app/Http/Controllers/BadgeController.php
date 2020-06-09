<?php

namespace App\Http\Controllers;

use App\Api\Badge\BadgeFactoryInterface;
use App\Api\Badge\BadgeManagementInterface;
use App\Api\Badge\BadgeRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BadgeController extends Controller
{
    protected $badgeFactory;
    protected $badgeRepository;
    protected $badgeManagement;

    public function __construct
    (
        BadgeFactoryInterface $badgeFactory,
        BadgeRepositoryInterface $badgeRepository,
        BadgeManagementInterface $badgeManagement
    )
    {
        $this->badgeFactory = $badgeFactory;
        $this->badgeRepository = $badgeRepository;
        $this->badgeManagement = $badgeManagement;
    }

    public function add()
    {
        return view('categories-products.badges.add');
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'badge' => 'required|file|image',
            'value' => 'required|numeric',
        ]);
        $this->badgeFactory->create($validatedData['title'], $validatedData['badge']->store('uploads', 'public'), $validatedData['value']);
        Storage::disk('uploads')->put('uploads', $validatedData['badge']);
        $request->session()->flash('alert-success', 'Badge aggiunto con successo');
        return redirect('badges/add');
    }

    public function read()
    {
        $badges = $this->badgeRepository->getAll();
        return view('categories-products.badges.read', compact('badges'));
    }

    public function edit()
    {
        $badges = $this->badgeRepository->getAll();
        return view('categories-products.badges.update', compact('badges'));
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'nullable',
            'badge' => 'nullable|file|image',
            'value' => 'nullable|numeric',
        ]);
        $badge = $this->badgeRepository->getById($request->badge_id);
        if ($request->has('badge')) {
            Storage::disk('uploads')->put('uploads', $validatedData['badge']);
            $validatedData['badge'] = $validatedData['badge']->store('uploads', 'public');
            Storage::disk('uploads')->delete($badge->image);
        }
        $this->badgeManagement->update($validatedData, $badge);
        $request->session()->flash('alert-success', 'Badge modificato con successo');
        return redirect('badges/update');
    }

    public function remove()
    {
        $badges = $this->badgeRepository->getAll();
        return view('categories-products.badges.delete', compact('badges'));
    }

    public function delete(Request $request)
    {
        $badge = $this->badgeRepository->deleteById($request->badge);
        Storage::disk('uploads')->delete($badge->image);
        $request->session()->flash('alert-success', 'Badge eliminato con successo');
        return redirect('badges/delete');
    }
}
