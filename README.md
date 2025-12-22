# 💰 SMART WALLET 2.0

SMART WALLET 2.0 est une application web de gestion financière personnelle,
développée en **PHP Orienté Objet**, permettant aux utilisateurs de gérer
leurs **revenus**, **dépenses** et de visualiser leur **situation financière**
via un dashboard clair.

Ce projet est une refonte complète d’une première version procédurale,
dans le but d’améliorer la **maintenabilité**, la **sécurité** et
l’organisation du code.

---

## 🎯 Objectifs du projet

- Appliquer les principes de la **programmation orientée objet (OOP)**
- Structurer un projet PHP de manière propre et maintenable
- Sécuriser l’accès utilisateur (authentification)
- Gérer les revenus et dépenses avec un CRUD complet
- Fournir un dashboard financier clair

---

## 📌 Planification du projet

La planification du projet **SMART WALLET 2.0** a été réalisée en suivant
une approche **Agile**, basée sur des **User Stories**.

Un tableau de planification a été utilisé afin de suivre l’avancement
des tâches selon les colonnes **To-Do / Doing / Done**.

🔗 **Lien vers la planification (Trello)** :  
👉 https://trello.com/b/2pTwtNp6/%F0%9F%93%98-smart-wallet-refonte-back-end-php-oriente-objet


### La planification contient :
- Les User Stories détaillées
- Le contexte de chaque fonctionnalité
- La description technique
- La Definition of Done
- Les checklists de suivi
- L’état d’avancement des tâches

---

## ⚙️ Technologies utilisées

- PHP 8 (Orienté Objet)
- MySQL
- PDO
- HTML / CSS
- Architecture MVC simplifiée

---

## 📁 Structure du projet

```txt
smart-wallet/
│
├── public/
│   └── index.php
│
├── app/
│   ├── core/
│   │   └── Database.php
│   │
│   ├── models/
│   │   ├── User.php
│   │   ├── Income.php
│   │   ├── Expense.php
│   │   └── Category.php
│   │
│   ├── controllers/
│   │   ├── AuthController.php
│   │   ├── IncomeController.php
│   │   └── ExpenseController.php
│   │
│   └── views/
│       ├── auth/
│       │   ├── login.php
│       │   └── register.php
│       │
│       └── dashboard/
│           └── index.php
│
├── database/
│   └── database.sql
│
└── README.md

## 📐 Diagrams & Modélisation

La conception de l’application **SMART WALLET 2.0** a été réalisée à l’aide
de plusieurs diagrammes UML afin de bien structurer le système avant
l’implémentation.

### 📊 Diagramme de classes (UML)
Représente la structure des classes, leurs attributs, méthodes
et les relations entre elles.

🔗 Lien :  
👉 [Voir le diagramme de classes](https://lucid.app/lucidchart/7efb4ddf-55bf-4aff-a019-d01212b079a9/edit?viewport_loc=-669%2C-658%2C4033%2C1892%2CHWEp-vi-RSFO&invitationId=inv_3c0fbb20-2178-4630-a50a-c56b47a8c684)

---

### 🧩 Diagramme de cas d’utilisation (Use Case Diagram)
Montre les interactions entre l’utilisateur et le système
(inscription, connexion, gestion des revenus et dépenses, dashboard).

🔗 Lien :  
 👉 [Voir le diagramme des cas d’utilisation](https://lucid.app/lucidchart/5753cd54-b086-4917-9060-2d13f48ca46c/edit?viewport_loc=-626%2C154%2C3452%2C1441%2C.Q4MUjXso07N&invitationId=inv_45ca1b21-05cf-49b0-b44d-230ef793bd0a)

---

### 🗄️ Diagramme Entité–Relation (ERD)
Décrit la structure de la base de données, les tables
et les relations entre elles.

🔗 Lien :  
👉 [Voir le diagramme ERD](https://lucid.app/lucidchart/04ee872c-2dc2-4542-a93e-d0ef16e8056b/edit?viewport_loc=663%2C71%2C2817%2C1322%2C0_0&invitationId=inv_d2a94de6-8a55-4b01-aba2-3928fd0401df)


- 📊 Diagramme de classes : [Consulter le diagramme](https://lucid.app/lucidchart/7efb4ddf-55bf-4aff-a019-d01212b079a9/edit?viewport_loc=-669%2C-658%2C4033%2C1892%2CHWEp-vi-RSFO&invitationId=inv_3c0fbb20-2178-4630-a50a-c56b47a8c684)

- 🧩 Diagramme de cas d’utilisation : [Consulter le diagramme](https://lucid.app/lucidchart/5753cd54-b086-4917-9060-2d13f48ca46c/edit?viewport_loc=-626%2C154%2C3452%2C1441%2C.Q4MUjXso07N&invitationId=inv_45ca1b21-05cf-49b0-b44d-230ef793bd0a)

- 🗄️ Diagramme ERD : [Consulter le diagramme](https://lucid.app/lucidchart/04ee872c-2dc2-4542-a93e-d0ef16e8056b/edit?viewport_loc=663%2C71%2C2817%2C1322%2C0_0&invitationId=inv_d2a94de6-8a55-4b01-aba2-3928fd0401df)
