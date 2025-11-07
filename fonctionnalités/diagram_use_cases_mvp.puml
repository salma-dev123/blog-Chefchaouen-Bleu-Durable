@startuml
title Diagramme de cas d'utilisation (MVP) - Blog Chefchaouen Bleu Durable
left to right direction
scale 1.3

actor "Visiteur" as Visiteur
actor "Éditeur" as Editeur
actor "Administrateur" as Admin

rectangle "MVP - Blog Chefchaouen Bleu Durable" {
  (Consulter la page d'accueil) as UC1
  (Consulter la liste des articles) as UC2
  (Voir les détails d’un article) as UC3
  (Commenter un article) as UC4
  (Créer un article) as UC5
  (Valider les articles) as UC6
}

' Relations des acteurs
Visiteur -- UC1
Visiteur -- UC2
Visiteur -- UC3
Visiteur -- UC4

Editeur -- UC5

Admin -- UC6

' Héritage
Editeur <|-- Admin

@enduml
