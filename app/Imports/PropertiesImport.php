<?php

namespace App\Imports;

use App\Property;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PropertiesImport implements ToModel,WithHeadingRow,WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        

         $property = Property::updateOrCreate([
        'title' => $row['title'],
        'slug' => str_slug($row['title']),
         ],
         [
            'price' => $row['price'],
            'purpose' => $row['purpose'],
            'type' => $row['type'],
            'image' => $row['image'],
            'bedroom' => $row['bedroom'],
            'bathroom' => $row['bathroom'],
            'city' => $row['city'],
            'city_slug' => str_slug($row['city']),
            'address' => $row['address'],
            'area' => $row['area'],
            'agent_id' => 1,
            'description' => $row['description'],
            'video' => $row['video'],
            'floor_plan' => $row['floor_plan'],
            'coordinate' => $row['coordinate'],
            'floors' => $row['floors'],
            'halls' => $row['halls'],
            'entries' => $row['entries'],
            'furnished' => $row['furnished'],
            'mroom' => $row['mroom'],
            'droom' => $row['droom'],
            'status' => $row['status'],
            'parking' => $row['parking'],
            'tank' => $row['tank'],
            'sale' => $row['sale'],
            'location' => $row['location'],    
         ],

);
        $property->save();
        //upload multiple imgs
        $imgArray = explode(',', $row['imgs']);
        foreach ($imgArray as $img)
        {
        if(!empty($img)){
            $property->gallery()->create([
                'property_id' => $property->id,
                'name' => $img,
            ]);
        }

        }


        return $property;

    }

    public function rules(): array
    {

        return [
            'title'     => 'required',
            'purpose'   => 'required|in:بيع,ايجار',
            'price'     => 'required',
            'type'      => 'required',
            'bedroom'   => 'required',
            'bathroom'  => 'required',
            'city'      => 'required',
            'address'   => 'required',
            'area'      => 'required',
            'description'      => 'required',

        ];
    }
}
