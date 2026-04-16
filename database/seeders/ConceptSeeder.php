<?php

namespace Database\Seeders;

use App\Models\Concept;
use Illuminate\Database\Seeder;

class ConceptSeeder extends Seeder
{
    public function run(): void
    {
        Concept::create([
            'title' => 'Curated long-term rentals',
            'title_id' => 'Penyewaan jangka panjang pilihan',
            'title_zh' => '精选长期租赁房源',
            'description' => 'Homes selected for monthly and yearly living',
            'description_id' => 'Rumah-rumah yang dipilih untuk hunian bulanan dan tahunan.',
            'description_zh' => '为每月和每年居住而选择的房屋',
            'icon' => 'fas fa-file-signature fa-fw',
        ]);

        Concept::create([
            'title' => 'Lifestyle & home services',
            'title_id' => 'Gaya hidup & layanan rumah tangga',
            'title_zh' => '生活方式及家居服务',
            'description' => 'Support beyond the property, from daily needs to practical setups.',
            'description_id' => 'Dukungan di luar properti, mulai dari kebutuhan sehari-hari hingga pengaturan praktis.',
            'description_zh' => '除了房产本身，我们还提供从日常生活需求到实际布置等方面的支持。',
            'icon' => 'fas fa-toolbox fa-fw',
        ]);

        Concept::create([
            'title' => 'Local expertise',
            'title_id' => 'Keahlian lokal',
            'title_zh' => '本地专业知识',
            'description' => 'On the ground knowledge of neighborhoods and long-term living.',
            'description_id' => 'Pengetahuan langsung tentang lingkungan sekitar dan pengalaman hidup jangka panjang.',
            'description_zh' => '对社区和长期居住环境有实际了解。',
            'icon' => 'fas fa-flag fa-fw',
        ]);

        Concept::create([
            'title' => 'Clear & human communication',
            'title_id' => 'Komunikasi yang jelas dan manusiawi.',
            'title_zh' => '清晰且人性化的沟通',
            'description' => 'A guided, Whatsapp based approach with real people.',
            'description_id' => '通过 WhatsApp 与真人进行指导。',
            'description_zh' => '通过 WhatsApp 与真人进行指导。',
            'icon' => 'fas fa-user-friends fa-fw',
        ]);
    }
}
