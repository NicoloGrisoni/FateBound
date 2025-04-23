# 🌌 **FateBound** – Scegli il tuo destino

Benvenuto su **FateBound**, l’esperienza narrativa interattiva che ti mette al centro della storia. Immergiti in mondi fantastici, fai scelte che contano, e segui il tuo cammino tra trame avvincenti e finali multipli. Ogni decisione apre nuove strade. Sei pronto a legare il tuo destino?

<br>

## 📄 **Pagine principali**

### 🏠 **Pagina iniziale**
- Presentazione dinamica del progetto
- Accesso immediato al gioco, anche senza registrazione
- Login/Registrazione per salvare il tuo progresso

### 🔐 **Login & Registrazione**
- Accesso sicuro tramite [Auth0](https://auth0.com)
- Raccolta di username, email e password
- Personalizzazione e tracciamento delle storie

### 📚 **Home Page**
- Esplora tutte le storie disponibili nel database
- Filtra per categorie o cerca le tue preferite
- Impostazioni rapide: tema, musica, accessibilità

### ⚙️ **Impostazioni**
- Tema grafico del sito (chiaro/scuro)
- Volume musica e suoni (se implementati)
- Preferenze di gioco e interfaccia

### 👤 **Profilo Utente**
- Visualizza e modifica le tue informazioni personali
- Cambia immagine del profilo
- Tracciamento dei tuoi progressi nelle storie

### 📖 **Dettagli Storia**
- Scopri descrizione, numero di capitoli e categoria
- Riprendi da dove hai lasciato grazie alla cronologia
- Vedi i finali sbloccati e quelli ancora da scoprire

### 🎮 **Esperienza di gioco**
- Capitoli presentati in sequenza dinamica
- Scelte influenzano i capitoli successivi (gestione tramite API)
- Se arrivi al capitolo finale:
  - 🕒 Tempo impiegato
  - 🌟 Finali completati vs finali totali
  - 🧠 Exp guadagnati (se implementati)
  - 🏅 Badge per traguardi raggiunti

<br>

## 🔧 **Struttura Tecnica**

### 🔁 Servizi AJAX & API
Ogni sezione della web app dialoga con il server in modo asincrono, garantendo una navigazione fluida e reattiva. Alcuni esempi:
- Recupero dei capitoli tramite API dedicate
- Integrazione con Unsplash per immagini narrative contestuali
- Gestione avanzata dei dati utente e delle interazioni

### 🗃️ **Database**
Struttura relazionale progettata per supportare l’interattività:
- **Users**: gestione degli utenti
- **Stories** e **Chapters**: contenuto narrativo
- **ChaptersInteracted**: tracking delle scelte effettuate
- **Options**: diramazioni narrative
- **Categories**: classificazione delle storie

<br>

## ✨ **Feature aggiuntive (in valutazione)**
- Sistema di **exp** e livelli
- **Badge** da collezionare per traguardi speciali
- Classifiche e progressi pubblici

<br>

> 🔮 *"Ogni scelta apre una porta. In quale mondo ti porterà la prossima?"*  
**Scoprilo con FateBound.**