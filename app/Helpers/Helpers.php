<?php

namespace App\Helpers;
use App\Models\Listrik;
use App\Models\Pulsa;
use App\Models\Inet;

class Helpers {
    public static function DateNormalize($date)
    {
        $date = preg_split("~[\s/-]+~", substr($date, 0, 10));
        switch ($date[1]) {
            case '01':
                $date[1] = 'Januari';
                break;
            
            case '02':
                $date[1] = 'Febuari';
                break;
            
            case '03':
                $date[1] = 'Maret';
                break;
            
            case '04':
                $date[1] = 'April';
                break;
            
            case '05':
                $date[1] = 'Mei';
                break;
            
            case '06':
                $date[1] = 'Juni';
                break;
            
            case '07':
                $date[1] = 'Juli';
                break;
            
            case '08':
                $date[1] = 'Agustus';
                break;
            
            case '09':
                $date[1] = 'September';
                break;
            
            case '10':
                $date[1] = 'Oktober';
                break;
            
            case '11':
                $date[1] = 'November';
                break;
            
            case '12':
                $date[1] = 'Desember';
                break;
                
            default:
                $date[1] = $date[1];
                break;
        }
        $date = $date[2] . ' ' . $date[1] . ' ' . $date[0];
        return $date;
    }

    public static function AddNewLangganan($name, $data=[])
    {
        if ($name == 'Inet') {
            $new = Inet::create($data);
        } else if ($name == 'Pulsa') {
            $new = Pulsa::create($data);
        } else if ($name == 'Listrik') {
            $new = Listrik::create($data);
        } else {
            return FALSE;
        }
        return $new;
    }

    public static function UpdateLangganan($name, $id, $data=[])
    {
        if ($name == 'Inet') {
            $store = Inet::findOrFail($id);
            $store->update($data);
        } else if ($name == 'Pulsa') {
            $store = Pulsa::findOrFail($id);
            $store->update($data);
        } else if ($name == 'Listrik') {
            $store = Listrik::findOrFail($id);
            $store->update($data);
        } else {
            return FALSE;
        }
        return $id;
    }

    public static function DeleteLangganan($name, $id)
    {
        if ($name == 'Inet') {
            $del = Inet::findOrFail($id);
            $del->delete();
        } else if ($name == 'Pulsa') {
            $del = Pulsa::findOrFail($id);
            $del->delete();
        } else if ($name == 'Listrik') {
            $del = Listrik::findOrFail($id);
            $del->delete();
        } else {
            return FALSE;
        }
        return TRUE;
    }
}