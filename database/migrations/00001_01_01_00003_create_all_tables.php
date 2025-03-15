<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllTables extends Migration
{
    public function up()
    {
        // Table: Section
        Schema::create('section', function (Blueprint $table) {
            $table->id('id_section');
            $table->string('nom_section', 50);
            $table->timestamps();
        });

        // Table: Classe
        Schema::create('classe', function (Blueprint $table) {
            $table->id('id_classe');
            $table->string('nom_classe', 50);
            $table->unsignedBigInteger('id_section');
            $table->foreign('id_section')->references('id_section')->on('section');
            $table->timestamps();
        });

        // Table: matieres
        Schema::create('matieres', function (Blueprint $table) {
            $table->id('id_matiere');
            $table->string('nom_matiere', 50);
            $table->timestamps();
        });

        // Table: Trimestre
        Schema::create('trimestre', function (Blueprint $table) {
            $table->id('id_trimestre');
            $table->string('nom_trimestre', 50);
            $table->string('sequence', 10);
            $table->timestamps();
        });

        // Table: Salle
        Schema::create('salle', function (Blueprint $table) {
            $table->id('id_salle');
            $table->string('nom_salle', 50);
            $table->string('emplacement', 50);
            $table->integer('capacite');
            $table->timestamps();
        });

        // Table: Eleve
        Schema::create('eleve', function (Blueprint $table) {
            $table->id('id_eleve');
            $table->string('nom_eleve', 50);
            $table->string('prenom_eleve', 50);
            $table->string('date_naiss', 50);
            $table->string('lieu_naiss', 50);
            $table->string('nom_parent', 50);
            $table->string('telephone_parent', 50);
            $table->unsignedBigInteger('id_salle');
            $table->foreign('id_salle')->references('id_salle')->on('salle');
            $table->timestamps();
        });

        // Table: Avertissement
        Schema::create('avertissement', function (Blueprint $table) {
            $table->id('id_avertissement');
            $table->string('description', 500);
            $table->string('date_avertissement', 50);
            $table->timestamps();
        });

        // Table: Paiement
        Schema::create('paiement', function (Blueprint $table) {
            $table->id('id_paiement');
            $table->float('tranche1');
            $table->float('tranche2');
            $table->float('tranche3');
            $table->unsignedBigInteger('id_eleve')->nullable();
            $table->foreign('id_eleve')->references('id_eleve')->on('eleve');
            $table->timestamps();
        });

        // Table: Administration
        Schema::create('administration', function (Blueprint $table) {
            $table->id('id_administration');
            $table->string('nom_personnel', 50);
            $table->string('profession', 150);
            $table->timestamps();
        });

        // Table: Enseignant
        Schema::create('enseignant', function (Blueprint $table) {
            $table->id('id_enseignant');
            $table->string('nom_enseignant', 50);
            $table->string('prenom_enseignant', 50);
            $table->unsignedBigInteger('id_administration');
            $table->foreign('id_administration')->references('id_administration')->on('administration');
            $table->timestamps();
        });

        // Table: materiel
        Schema::create('materiel', function (Blueprint $table) {
            $table->id('id_materiel');
            $table->string('nom_materiel', 50);
            $table->integer('quantite');
            $table->timestamps();
        });

        // Table: Rattacher
        Schema::create('rattacher', function (Blueprint $table) {
            $table->unsignedBigInteger('id_classe');
            $table->unsignedBigInteger('id_matiere');
            $table->foreign('id_classe')->references('id_classe')->on('classe');
            $table->foreign('id_matiere')->references('id_matiere')->on('matieres');
            $table->primary(['id_classe', 'id_matiere']);
            $table->timestamps();
        });

        // Table: Obtenir
        Schema::create('obtenir', function (Blueprint $table) {
            $table->unsignedBigInteger('id_matiere');
            $table->unsignedBigInteger('id_trimestre');
            $table->unsignedBigInteger('id_eleve');
            $table->unsignedBigInteger('id_classe');
            $table->float('note');
            $table->string('date', 50);
            $table->foreign('id_matiere')->references('id_matiere')->on('matieres');
            $table->foreign('id_trimestre')->references('id_trimestre')->on('trimestre');
            $table->foreign('id_eleve')->references('id_eleve')->on('eleve');
            $table->foreign('id_classe')->references('id_classe')->on('classe');
            $table->primary(['id_matiere', 'id_trimestre', 'id_eleve', 'id_classe']);
            $table->timestamps();
        });

        // Table: Recevoir
        Schema::create('recevoir', function (Blueprint $table) {
            $table->unsignedBigInteger('id_administration');
            $table->unsignedBigInteger('id_eleve');
            $table->string('date_recevoir', 50);
            $table->foreign('id_administration')->references('id_administration')->on('administration');
            $table->foreign('id_eleve')->references('id_eleve')->on('eleve');
            $table->primary(['id_administration', 'id_eleve']);
            $table->timestamps();
        });

        // Table: Dispenser
        Schema::create('dispenser', function (Blueprint $table) {
            $table->unsignedBigInteger('id_enseignant');
            $table->unsignedBigInteger('id_classe');
            $table->string('date_dispenser', 50);
            $table->foreign('id_enseignant')->references('id_enseignant')->on('enseignant');
            $table->foreign('id_classe')->references('id_classe')->on('classe');
            $table->primary(['id_enseignant', 'id_classe']);
            $table->timestamps();
        });

        // Table: Acheter
        Schema::create('acheter', function (Blueprint $table) {
            $table->unsignedBigInteger('id_administration');
            $table->unsignedBigInteger('id_materiel');
            $table->string('date_achat', 50);
            $table->foreign('id_administration')->references('id_administration')->on('administration');
            $table->foreign('id_materiel')->references('id_materiel')->on('materiel');
            $table->primary(['id_administration', 'id_materiel']);
            $table->timestamps();
        });
    }

    public function down()
    {
        // Supprimer toutes les tables dans l'ordre inverse de leur création
        Schema::dropIfExists('acheter');
        Schema::dropIfExists('dispenser');
        Schema::dropIfExists('recevoir');
        Schema::dropIfExists('obtenir');
        Schema::dropIfExists('rattacher');
        Schema::dropIfExists('materiel');
        Schema::dropIfExists('enseignant');
        Schema::dropIfExists('administration');
        Schema::dropIfExists('paiement');
        Schema::dropIfExists('avertissement');
        Schema::dropIfExists('eleve');
        Schema::dropIfExists('salle');
        Schema::dropIfExists('trimestre');
        Schema::dropIfExists('matieres');
        Schema::dropIfExists('classe');
        Schema::dropIfExists('section');
    }
}