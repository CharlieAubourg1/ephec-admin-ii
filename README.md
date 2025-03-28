# ephec-admin-ii

GROUPE 2TL2-4 


## Membres du groupe

| Nom               | Pseudo Github     | 
| ----------------- | ----------------- | 
| Mickaël TALIDEC   | mickTa            | 
| Sydney TEXIER     | MrNobody005       | 
| Charlie AUBOURG   | CharlieAubourg1   | 
| Bogomir STOYANOV  | bogogod           |

## 📂 Arborescence du projet

```
ephec-admin-ii
 ┣ img
 ┣ TP3
 ┃ ┣ Dockerfile
 ┃ ┗ index.html
 ┣ TP4
 ┃ ┗ configs
 ┃ ┃ ┣ configFiles
 ┃ ┃ ┃ ┣ l2-4.zone
 ┃ ┃ ┃ ┗ named.conf
 ┃ ┃ ┣ docker-compose.yml
 ┃ ┃ ┗ Dockerfile
 ┣ TP6
 ┃ ┣ web
 ┃ ┃ ┣ blog
 ┃ ┃ ┃ ┗ index.html
 ┃ ┃ ┣ php
 ┃ ┃ ┃ ┗ Dockerfile
 ┃ ┃ ┣ www
 ┃ ┃ ┃ ┣ index.html
 ┃ ┃ ┃ ┗ products.php
 ┃ ┃ ┣ docker-compose.yml
 ┃ ┃ ┣ Dockerfile
 ┃ ┃ ┣ init.sql
 ┃ ┃ ┣ my-resolve.cnf
 ┃ ┃ ┗ nginx.conf
 ┃ ┗ woodytoys.sql
 ┗ README.md
```

- `./TP4/configs/Dockerfile` : Définit l'image Docker pour le serveur Bind.
- `./TP4/configs/docker-compose.yml` : Permet de lancer le serveur DNS avec Docker Compose.
- `./TP4/configs/configFiles/l2-4.zone` : Fichier de zone DNS contenant les enregistrements.
- `./TP4/configFiles/named.conf` : Fichier de configuration principal de Bind.

### 1 Démarrer le serveur DNS
Lancer le serveur en arrière-plan avec Docker Compose :
```bash
docker compose up -d
```

### 2 Vérifier que le conteneur tourne
```bash
docker ps -a
```
Le conteneur du serveur DNS doit être listé comme en cours d'exécution.

### 3 Tester la résolution DNS
Depuis la machine hôte :
```bash
dig @localhost www.l2-4.ephec-ti.be
```
Si le serveur DNS fonctionne correctement, il doit renvoyer une adresse IP valide.

### 4 Arrêter le serveur DNS
```bash
docker compose down
```

## 🛠️ Modification des fichiers de configuration

### Modifier un enregistrement DNS
1. Ouvrir `configs/configFiles/l2-4.zone` et mettre à jour les enregistrements. 
2. **Incrémenter le numéro de série** dans `l2-4.zone`. (ex : `2025032101  ; Numéro de série (YYYYMMDDXX)`)
3. Modifier le fichier `configs/docker-compose.yml` et changez la version de l'image pour toujours avoir un back up : `image: bind9_vx`
4. Relancer le conteneur avec :
   ```bash
   docker compose down && docker compose up --build -d
   ```
5. Vous pouvez vérifier toutes les versions des images déjà créées avec :
   ```bash
   docker images
