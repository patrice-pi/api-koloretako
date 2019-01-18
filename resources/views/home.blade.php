@extends('layouts.app')

@section('content')

    <div id="home">
        <div class="header_image"></div>

        <div class="container my-5">

            <h1 class="text-center text-uppercase my-5">Koloretako</h1>

            <h2 class="text-center">Le jeu de mémoire visuel ludique et amusant</h2>

            <div class="row mt-5 justify-content-center text-justify">
                <div class="col-12 col-lg-8">
                    <h3>But du jeu</h3>
                    <p>
                        Le but du jeu est de retenir la combinaison de couleurs qui apparaît sur la led et de saisir la bonne combinaison de couleurs dans l’ordre d’apparition avec les boutons correspondants aux couleurs. À chaque niveau supplémentaire, une nouvelle combinaison apparaît avec une couleur supplémentaire ou une vitesse de défilement plus rapide selon le niveau de difficulté. A la fin de la partie, on enregistre un pseudo en base de donnée avec le niveau atteint. Le joueur a 10 points de vie avant de perdre et de finir la partie.
                    </p>
                </div>
                <div class="col-12 col-lg-8 mt-5">

                    <h3>Le jeu comporte 4 niveaux de difficulté :</h3>
                    <h4>Facile :</h4>
                    <p>
                        Tous les 10 niveaux, une couleur s’ajoute à la combinaison. Le temps d’apparition est d’environ 0.5s. Le joueur doit appuyer sur un bouton avant que la combinaison commence.
                    </p>

                    <h4>Intermédiaire :</h4>
                    <p>
                        Tous les 5 niveaux, une couleur s’ajoute à la combinaison. Sur les 5 niveaux, le temps d’apparition de la couleur est réduit. Le joueur doit appuyer sur un bouton avant que la combinaison commence.<br/><br/>
                        Ex :
                        <ul class="list-unstyled">
                            <li><b>1</b> - Rouge (0.5s) - Vert (0.5s) - Jaune (0.5s) - Bleu (0.5s)</li>
                            <li><b>2</b> - Bleu (0.4s) - Vert (0.4s) - Jaune (0.4s) - Jaune (0.4s)</li>
                            <li><b>3</b> - Vert (0.3s) - Vert (0.3s) - Bleu (0.3s) - Vert (0.3s)</li>
                            <li><b>4</b> - Rouge (0.2s) - Vert (0.2s) - Vert (0.2s) - Rouge (0.2s)</li>
                            <li><b>5</b> - Bleu (0.5s) - Bleu (0.5s) - Jaune (0.5s) - Vert (0.5s)</li>
                            <li><b>6</b> - Rouge (0.4s) - Vert (0.4s) - Jaune (0.4s) - Bleu (0.4s) - Vert (0.4s)</li>
                        </ul>
                    </p>

                    <h4>Difficile :</h4>
                    <p>
                        A chaque nouvelle combinaison, une couleur en plus apparaît. le temps d’apparition de la couleur est d’environ 0.3s. Le joueur doit appuyer sur un bouton avant que la combinaison commence.
                    </p>

                    <h4>Légende :</h4>
                    <p>
                        A chaque nouvelle combinaison, une couleur en plus apparaît. le temps d’apparition de la couleur est d’environ 0.2s. Les niveaux s'enchaînent, sans temps de repos.
                    </p>
                </div>
            </div>
        </div>

    </div>

@endsection
