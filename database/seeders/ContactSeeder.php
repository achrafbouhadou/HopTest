<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    public function run()
    {
        Contact::create([
            'first_name' => 'Arthur',
            'last_name' => 'Martins',
            'email' => 'arthur.martins@example.com',
            'company' => 'Andre Mercier S.A.R.L.',
            'address' => 'boulevard de Guerin',
            'postal_code' => '82908',
            'city' => 'Laurentboeuf',
            'status' => 'Lead',
        ]);

        Contact::create([
            'first_name' => 'Martin',
            'last_name' => 'Marechal',
            'email' => 'martin.marechal@example.com',
            'company' => 'Martineau',
            'address' => 'rue de la Paix',
            'postal_code' => '75002',
            'city' => 'Paris',
            'status' => 'Lead',
        ]);

        Contact::create([
            'first_name' => 'Olivier',
            'last_name' => 'Jacob',
            'email' => 'olivier.jacob@example.com',
            'company' => 'Cousin',
            'address' => 'avenue des Champs-Élysées',
            'postal_code' => '75008',
            'city' => 'Paris',
            'status' => 'Client',
        ]);

        Contact::create([
            'first_name' => 'Bertrand',
            'last_name' => 'Masson',
            'email' => 'bertrand.masson@example.com',
            'company' => 'Prevost SARL',
            'address' => 'rue de Rivoli',
            'postal_code' => '75001',
            'city' => 'Paris',
            'status' => 'Client',
        ]);

        Contact::create([
            'first_name' => 'Xavier',
            'last_name' => 'Ribeiro',
            'email' => 'xavier.ribeiro@example.com',
            'company' => 'Ruiz',
            'address' => 'boulevard Saint-Germain',
            'postal_code' => '75006',
            'city' => 'Paris',
            'status' => 'Prospect',
        ]);

        Contact::create([
            'first_name' => 'André',
            'last_name' => 'Joly',
            'email' => 'andre.joly@example.com',
            'company' => 'Roche',
            'address' => 'rue de la République',
            'postal_code' => '69002',
            'city' => 'Lyon',
            'status' => 'Client',
        ]);

        Contact::create([
            'first_name' => 'Lucas',
            'last_name' => 'Georges',
            'email' => 'lucas.georges@example.com',
            'company' => 'Leclerc Rousset et Fils',
            'address' => 'avenue de la Gare',
            'postal_code' => '33000',
            'city' => 'Bordeaux',
            'status' => 'Lead',
        ]);

        Contact::create([
            'first_name' => 'Léon',
            'last_name' => 'Launay',
            'email' => 'leon.launay@example.com',
            'company' => 'Lecomte',
            'address' => 'rue de la Liberté',
            'postal_code' => '21000',
            'city' => 'Dijon',
            'status' => 'Lead',
        ]);

        Contact::create([
            'first_name' => 'Thérèse',
            'last_name' => 'Blanc',
            'email' => 'therese.blanc@example.com',
            'company' => 'Pottier Blanchard SAS',
            'address' => 'rue de la Victoire',
            'postal_code' => '06000',
            'city' => 'Nice',
            'status' => 'Lead',
        ]);

        Contact::create([
            'first_name' => 'Henriette',
            'last_name' => 'Bailly',
            'email' => 'henriette.bailly@example.com',
            'company' => 'Perrier Michaud SA',
            'address' => 'rue de l\'Église',
            'postal_code' => '13002',
            'city' => 'Marseille',
            'status' => 'Lead',
        ]);
    }
}
