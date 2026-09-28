<?php

namespace Database\Seeders;

use App\Models\Standard;
use Illuminate\Database\Seeder;

class StandardSeeder extends Seeder
{
    public function run(): void
    {
        Standard::create([
            'title' => 'Legal Clarity',
            'title_id' => 'Kejelasan Hukum',
            'title_fr' => 'Clarté Juridique',
            'description' => 'Every home is fully verified to ensure a secure and transparent rental process.',
            'description_id' => 'Setiap rumah diverifikasi sepenuhnya untuk memastikan proses sewa yang aman dan transparan.',
            'description_fr' => 'Chaque logement est entièrement vérifié pour garantir un processus de location sécurisé et transparent.',
        ]);

        Standard::create([
            'title' => 'Living Quality',
            'title_id' => 'Kualitas Hunian',
            'title_fr' => 'Qualité de Vie',
            'description' => 'Each home is inspected to meet our standards for safety, structure, and everyday living.',
            'description_id' => 'Setiap rumah diperiksa untuk memenuhi standar kami dalam hal keselamatan, struktur, dan kehidupan sehari-hari.',
            'description_fr' => 'Chaque logement est inspecté untuk répondre à nos normes de sécurité, de structure et de vie quotidienne.',
        ]);

        Standard::create([
            'title' => 'Honest Presentation',
            'title_id' => 'Presentasi yang Jujur',
            'title_fr' => 'Présentation Honnête',
            'description' => 'All visuals are captured directly, reflecting each home as it truly is.',
            'description_id' => 'Semua visual diambil secara langsung, mencerminkan kondisi rumah yang sebenarnya.',
            'description_fr' => 'Tous les visuels sont pris directement, reflétant chaque logement tel qu’il est réellement.',
        ]);

        Standard::create([
            'title' => 'Fully Equipped Living',
            'title_id' => 'Hunian yang Lengkap',
            'title_fr' => 'Logement Entièrement Équipé',
            'description' => 'Fully furnished and equipped with essentials, ready for everyday living.',
            'description_id' => 'Lengkap dengan perabot (fully furnished) dan kebutuhan esensial, siap untuk ditinggali sehari-hari.',
            'description_fr' => 'Entièrement meublé et équipé des éléments essentiels, prêt pour la vie quotidienne.',
        ]);

        Standard::create([
            'title' => 'Comfort Standards',
            'title_id' => 'Standar Kenyamanan',
            'title_fr' => 'Normes de Confort',
            'description' => 'Each home is held to a consistent level of quality, ensuring a reliable and comfortable living experience.',
            'description_id' => 'Setiap rumah mempertahankan tingkat kualitas yang konsisten, memastikan pengalaman tinggal yang andal dan nyaman.',
            'description_fr' => 'Chaque logement respecte un niveau de qualité constant, garantissant une expérience de vie fiable et confortable.',
        ]);

        Standard::create([
            'title' => 'Secure Process',
            'title_id' => 'Proses yang Aman',
            'title_fr' => 'Processus Sécurisé',
            'description' => 'Deposits, inventory, and agreements are managed through a structured and transparent process for both tenants and owners.',
            'description_id' => 'Deposit, inventaris, dan perjanjian dikelola melalui proses yang terstruktur dan transparan baik bagi penyewa maupun pemilik.',
            'description_fr' => 'Les dépôts, les inventaires et les contrats sont gérés via un processus structuré et transparent, tant pour les locataires que pour les propriétaires.',
        ]);

        Standard::create([
            'title' => 'Transparent Experience',
            'title_id' => 'Pengalaman yang Transparan',
            'title_fr' => 'Expérience Transparente',
            'description' => 'Clear communication, accurate information, and a fair, documented approach at every step.',
            'description_id' => 'Komunikasi yang jelas, informasi yang akurat, serta pendekatan yang adil dan terdokumentasi di setiap langkah.',
            'description_fr' => 'Une communication claire, des informations précises et une approche juste et documentée à chaque étape.',
        ]);
    }
}
