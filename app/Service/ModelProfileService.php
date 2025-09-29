<?php

namespace App\Service;

use App\Models\ModelProfile;
use App\Models\ModelPhoto;
use App\Models\User;
use Illuminate\Http\Request;

class ModelProfileService
{
    /**
     * Create a new model profile.
     */
    public function create(Request $request): ModelProfile
    {
        $userId = auth()->user()->id;
        $user = User::find($userId);

        $user->update([
            'phone' => $request->phone,
            'name' => $request->name,
            'gender' => $request->gender
        ]);

        $user->modelProfile()->create($request->only([

            "instagram_link" => $request->instagram_link,
            "category" => $request->category,
            "height_cm" => $request->height_cm,
            "weight_kg" => $request->weight_kg,
        ]));

        // Handle multiple photo uploads
        $this->handlePhotos($request, $user->modelProfile);

        return $user->modelProfile;
    }

    /**
     * Update an existing model profile.
     */
    public function update(Request $request, ModelProfile $model): ModelProfile
    {
        // dd($request->all());
        // dd($model);
        try {
            $model->user->update([
                'phone' => $request->phone,
                'name' => $request->name,
                'gender' => $request->gender
            ]);
            $model->update([
                "instagram_link" => $request->instagram_link,
                "category" => $request->category,
                "height_cm" => $request->height_cm,
                "weight_kg" => $request->weight_kg,
            ]);
            // $model->save();
        } catch (\Throwable $th) {
            dd($th);
        }

        // Handle new uploaded photos (old ones remain unless explicitly deleted)
        $this->handlePhotos($request, $model);

        return $model;
    }

    /**
     * Handle multiple photo uploads.
     */
    protected function handlePhotos(Request $request, ModelProfile $model, string $fieldName = 'portfolio'): void
    {
        // dd($request->file($fieldName));
        if ($request->file($fieldName) && count($request->file($fieldName))) {
            foreach ($request->file($fieldName) as $photoFile) {
                $photoName = time() . '_model_profile_' . uniqid() . '.' . $photoFile->getClientOriginalExtension();
                $photoFile->move(public_path('uploads/models/media'), $photoName);

                // dd($model);
                $model->photos()->create([
                    'photo_path' => 'uploads/models/media/' . $photoName,
                ]);
            }
        }
    }

    /**
     * Delete a photo (DB + file).
     */
    public function deletePhoto(ModelPhoto $photo): void
    {
        $path = public_path($photo->photo_path);
        if (file_exists($path)) {
            unlink($path);
        }

        $photo->delete();
    }
}
