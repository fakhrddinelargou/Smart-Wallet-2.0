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
