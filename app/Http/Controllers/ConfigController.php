<?php

namespace App\Http\Controllers;

use App\Models\ConfHome;
use App\Models\Profile;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function home()
    {
        $data = ConfHome::first();
        return view('panel.conf.home', compact('data'));
    }
    public function profile()
    {
        $data = Profile::first();
        return view('panel.conf.profile', compact('data'));
    }
    public function profile_update(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'sec_3_data' => 'nullable|array',
                'sec_3_data.*' => 'nullable|string|max:255', // each item in the vision array should be a string
            ]);
            $data = Profile::first();
            $data->address = $request->address;
            $data->description_footer = $request->description_footer;
            $data->telephone = $request->telephone;
            $data->whatsapp = $request->whatsapp;
            $data->instagram = $request->instagram;
            $data->facebook = $request->facebook;
            $data->twitter = $request->twitter;
            $data->pinterest = $request->pinterest;
            $data->email = $request->email;
            $data->operational_time = $request->operational_time;
            $data->save();
            return $this->responseSuccess($data, 'Success Updated');
        } catch (QueryException $ex) {
            if ($errorMessage = getDbException($ex->errorInfo)) {
                return $this->ResponseError($errorMessage);
            } else {
                return $this->ResponseError($ex->getMessage());
            }
        } catch (Exception $ex) {
            return $this->ResponseError($ex->getMessage());
        }
    }
    public function home_update(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'sec_3_data' => 'nullable|array',
                'sec_3_data.*' => 'nullable|string|max:255', // each item in the vision array should be a string
            ]);
            $data = ConfHome::first();

            if ($request->hasFile('sec_2_sidebar_background_upload')) {
                $photo = $request->file('sec_2_sidebar_background_upload');
                $originalFilename = time() . $photo->getClientOriginalName(); // Ambil nama asli file
                $path = $photo->storeAs('upload/images', $originalFilename, 'public');
                $data->sec_2_sidebar_background = $originalFilename;
            }
            if ($request->hasFile('sec_4_image_upload')) {
                $photo = $request->file('sec_4_image_upload');
                $originalFilename = time() . $photo->getClientOriginalName(); // Ambil nama asli file
                $path = $photo->storeAs('upload/images', $originalFilename, 'public');
                $data->sec_4_image = $originalFilename;
            }


            $sec_3_data = [];
            foreach ($request->sec_3_data_icon as $index => $ico) {
                if (!empty($request->sec_3_data_icon[$index]) && !empty($request->sec_3_data_value[$index]) && !empty($request->sec_3_data_desc[$index]))
                    $sec_3_data[] = [
                        'icon' => $request->sec_3_data_icon[$index],
                        'value' => $request->sec_3_data_value[$index],
                        'satuan' => $request->sec_3_data_satuan[$index],
                        'desc' => $request->sec_3_data_desc[$index],
                    ];
            }
            $data->sec_3_data = json_encode($sec_3_data);

            $sec_2_sidebar = [];
            foreach ($request->sec_2_sidebar_label as $index => $sec2) {
                if (!empty($request->sec_2_sidebar_label[$index]))
                    $sec_2_sidebar[] = [
                        'label' => $request->sec_2_sidebar_label[$index],
                        'link' => $request->sec_2_sidebar_link[$index],
                    ];
            }
            $data->sec_2_sidebar = json_encode($sec_2_sidebar);
            $data->sec_4_list = json_encode($request->sec_4_list);


            $data->save();
            return $this->responseSuccess($data, 'Success Updated');
        } catch (QueryException $ex) {
            if ($errorMessage = getDbException($ex->errorInfo)) {
                return $this->ResponseError($errorMessage);
            } else {
                return $this->ResponseError($ex->getMessage());
            }
        } catch (Exception $ex) {
            return $this->ResponseError($ex->getMessage());
        }
    }
}
