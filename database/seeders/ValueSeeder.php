<?php

namespace Database\Seeders;

use App\Models\Value;
use Illuminate\Database\Seeder;

class ValueSeeder extends Seeder
{
    public function run(): void
    {
        Value::create([
            'title' => 'Curated Homes',
            'title_id' => 'Rumah Terpilih',
            'title_fr' => 'Maisons sélectionnées',
            'short_description' => 'Homes carefully selected for monthly and yearly living.',
            'short_description_id' => 'Rumah-rumah yang dipilih dengan cermat untuk hunian bulanan dan tahunan.',
            'short_description_fr' => 'Des maisons soigneusement sélectionnées pour un usage mensuel et annuel.',
            'description' => 'Homes selected for monthly and yearly living. Fully furnished, well-maintained, and defined by a consistent standar of comfort and functionality.',
            'description_id' => 'Rumah yang dipilih untuk hunian bulanan dan tahunan. Lengkap dengan perabotan, terawat dengan baik, dan didefinisikan oleh standar kenyamanan dan fungsionalitas yang konsisten.',
            'description_fr' => 'Maisons sélectionnées pour des locations mensuelles ou annuelles. Entièrement meublées, bien entretenues et caractérisées par un niveau de confort et de fonctionnalité constant.',
            'icon' => 'fas fa-building',
        ]);

        Value::create([
            'title' => 'Effortless Living',
            'title_id' => 'Hidup Tanpa Repot',
            'title_fr' => 'Vivre sans effort',
            'short_description' => 'A Seamless transition info everyday living.',
            'short_description_id' => 'Transisi yang mulus ke kehidupan sehari-hari.',
            'short_description_fr' => 'Une transition en douceur vers la vie quotidienne.',
            'description' => 'A smooth living experience, from the moment you arrive. Supported by a trusted network, connecting you to everything you may need. Daily life flows with ease.',
            'description_id' => 'Pengalaman hidup yang lancar, sejak saat Anda tiba. Didukung oleh jaringan terpercaya, menghubungkan Anda dengan segala yang mungkin Anda butuhkan. Kehidupan sehari-hari berjalan dengan mudah.',
            'description_fr' => 'Un séjour tout en douceur dès votre arrivée. Un réseau de confiance vous connecte à tout ce dont vous avez besoin. Votre quotidien se déroule en toute sérénité.',
            'icon' => 'fas fa-screwdriver-wrench',
        ]);

        Value::create([
            'title' => 'Reliable Support',
            'title_id' => 'Dukungan Terpercaya',
            'title_fr' => 'Assistance fiable',
            'short_description' => 'Thoughtful, responsive esupport you can rely on.',
            'short_description_id' => 'Dukungan elektronik yang penuh perhatian dan responsif yang dapat Anda andalkan.',
            'short_description_fr' => 'Une assistance en ligne attentive et réactive sur laquelle vous pouvez compter.',
            'description' => 'A steady presence, throughout your time here. Support that stays with you, beyond just the key handover.',
            'description_id' => 'Kehadiran yang stabil, sepanjang waktu Anda di sini. Dukungan yang tetap bersama Anda, lebih dari sekadar penyerahan kunci.',
            'description_fr' => 'Une présence constante, tout au long de votre séjour. Un soutien qui perdure, bien au-delà de la simple remise des clés.',
            'icon' => 'fas fa-phone',
        ]);
    }
}
