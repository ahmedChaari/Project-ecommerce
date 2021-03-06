<?php

use Illuminate\Database\Seeder;
use App\Head;
class HeadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Head::create([
            'tel'           =>   '212 664647978',
            'email'         =>   'shop@gmail.com',
            'adress'        =>   'kenitra ville -maroc-',
            'colorHead'     =>   '#4F55FF',
            'colorStyle'    =>   '#ffffff',
            'colorNav'      =>   '#C859FF',
            'colorStyleNav' =>   '#4F55FF',
            'fontSizeNav'   =>   '16',
            'fontSizeHead'  =>   '16',
            'image'         =>   'heads/HDo2Vbut76MXLiEoiAAPai224Bqfwz80SBOt1nSL.png'
             ]);
    }
}