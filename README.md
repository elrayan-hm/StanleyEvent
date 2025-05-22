# 🎯 STANLEY 2025 - Système d'invitation & d'inscription automatisé

Un projet complet permettant la gestion d'invitations à un événement via email, et la collecte des inscriptions à travers une interface web dynamique.

## ✉️ Fonctionnalités principales

- ✅ Script Python d'envoi automatique d'e-mails via SMTP
- 📩 Invitation HTML stylisée envoyée aux participants
- 🌐 Formulaire d'inscription en PHP avec :
  - Validation des champs
  - Vérification des doublons par e-mail
  - Sauvegarde locale (`registred.txt`)
- 🎨 Interface web moderne avec animations CSS (vagues, alertes personnalisées)
- 🔐 Sécurisation basique côté serveur
- 📁 Structure de projet simple et réutilisable

## 🔧 Technologies utilisées

- **Python** (SMTP, email.mime)
- **HTML / CSS / JavaScript**
- **PHP** (form handling, file I/O)
- (Prévu) **Google Sheets API** pour une sauvegarde cloud

## 🚀 Lancement du projet

### 1. Envoi d'invitations (Python)

```bash
python SendMail.py
