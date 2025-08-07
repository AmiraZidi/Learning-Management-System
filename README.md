# 📘 Chapitre 2 — Spécifications des besoins

## 🧩 Introduction

Ce chapitre présente en détail les **spécifications fonctionnelles** et **non fonctionnelles** de notre application **LMS (Learning Management System)**, destinée au département STIC de l’ISET de Gabès. Il décrit également les **cas d’utilisation** qui illustrent les interactions entre les différents acteurs du système.

L’objectif de cette phase est de **définir les exigences** essentielles à la conception, à la mise en œuvre et à l’optimisation des fonctionnalités attendues par les utilisateurs finaux.

---

## 👥 1. Identification des acteurs du système

Un **acteur** est une entité externe (personne ou système) interagissant avec l’application, soit en consultant, soit en modifiant son état. Trois rôles principaux sont identifiés :

- 🛠️ **Administrateur**
- 👨‍🏫 **Enseignant**
- 🎓 **Étudiant**

---

## 📋 2. Product Backlog (Méthode Scrum)

Le Product Backlog regroupe l'ensemble des **fonctionnalités à développer**, priorisées selon la méthode **MoSCoW** (Must, Should, Could, Won’t). Chaque **User Story** décrit une action souhaitée par un utilisateur spécifique.

### 📌 Méthodologie MoSCoW :
| Priorité | Signification |
|----------|----------------|
| `M` | Must Have – Obligatoire |
| `S` | Should Have – Important |
| `C` | Could Have – Optionnel |
| `W` | Won’t Have – À exclure pour cette version |

---

### 🗂️ Tableau des fonctionnalités principales

| ID | Fonctionnalité | Acteur(s) | User Story | Priorité |
|----|----------------|-----------|------------|----------|
| 1 | Authentification | Admin, Enseignant, Étudiant | En tant qu'utilisateur, je souhaite m’authentifier pour accéder au LMS | M |
| 2 | Gestion des comptes | Admin | Gérer et consulter les utilisateurs | M |
| 3 | Profil utilisateur | Enseignant, Étudiant | Modifier mot de passe et infos personnelles | S |
| 4 | Gestion scolaire | Admin | Gérer classes, matières, salles, spécialités | M |
| 5 | Affectations | Tous | Gérer et consulter les affectations | M |
| 6 | Emplois du temps | Tous | Créer/Consulter mon emploi du temps | C |
| 7 | Mot de passe oublié | Enseignant, Étudiant | Réinitialiser mon mot de passe | S |
| 8 | Notes | Enseignant, Étudiant | Enregistrer et consulter les notes | S |
| 9 | Absences | Enseignant, Étudiant | Enregistrer et consulter les absences | S |
| 10 | Cours | Tous | Gérer et consulter les supports de cours | C |
| 11 | Demandes | Enseignant, Admin | Gérer les demandes internes | S |
| 12 | Messagerie | Étudiant | Envoyer un message à un enseignant | S |
| 13 | Annonces | Admin, Enseignant | Partager et consulter des annonces | C |
| 14 | Stages | Admin, Enseignant, Étudiant | Gérer et consulter les soutenances | W |

---

## ⚙️ 3. Besoins non fonctionnels

Les exigences non fonctionnelles garantissent la qualité globale de l’application :

- ✅ **Efficacité** : Réactivité et stabilité dans toutes les situations.
- 🔧 **Maintenabilité & Scalabilité** : Code clair et modulaire pour une évolutivité facile.
- 🔐 **Sécurité** : Protection renforcée contre les attaques, virus et erreurs humaines.
- 🎨 **Ergonomie & Esthétique** : Interface épurée et intuitive basée sur le **Material UI**, optimisée pour tous les appareils (UX/UI).

---

## 🛠️ Technologies envisagées

- **ViteJS** pour le frontend (UI)
- **Laravel** pour le backend
- **MySQL** pour la base de données

---

## ✍️ Auteurs

Projet réalisé par :

- **Zidi Amira**
- **Guefresh Nesrine**

Dans le cadre du projet de fin d'études à l’ISET de Gabès – Département STIC.

---

## 📜 Licence

Ce projet est protégé. Toute reproduction ou réutilisation sans autorisation est interdite.

---

