
export function createTableClient(clientsList, id, lastName, firstName, address, telephone, meetingDate, creationDate) {

    // Créer nos élèments html à partir de JavaScript pour chaque ligne du tableau des clients.
    // Imposer la disposition en display:grid.
    const tableRow = document.createElement('div');
    tableRow.className = 'client-datas';
    tableRow.style.display = 'grid';
  
     // Création de chaque cellules du tableau des clients.
     const cellId = document.createElement('div');
     cellId.style.pointerEvents = 'none';
     const cellLastName = document.createElement('div');
     cellLastName.style.pointerEvents = 'none';
     const cellFirstName = document.createElement('div');
     cellFirstName.style.pointerEvents = 'none';
     const cellAddress = document.createElement('div');
     cellAddress.style.pointerEvents = 'none';
     const cellTelephone = document.createElement('div');
     cellTelephone.style.pointerEvents = 'none';
     const cellMeetingDate = document.createElement('div');
     cellMeetingDate.style.pointerEvents = 'none';
     const cellCreationDate = document.createElement('div');
     cellCreationDate.style.pointerEvents = 'none';
  
      // Ajout des valeurs récupérés depuis l'objet "data.clients" via "client".
      cellId.innerHTML = id;
      cellLastName.innerHTML = lastName;
      cellFirstName.innerHTML = firstName;
      cellAddress.innerHTML = address;
      cellTelephone.innerHTML = telephone;
      cellMeetingDate.innerHTML = meetingDate;
      cellCreationDate.innerHTML = creationDate;
  
      // Assemblage du tableau des clients en créant les balises enfants.
      tableRow.append(cellId, cellLastName, cellFirstName, cellAddress, cellTelephone, cellMeetingDate, cellCreationDate);
  
      clientsList.appendChild(tableRow);
  
  }

export function DisplayClientsIfNeeded(data) {

    const clientsTable = document.querySelector('#table');
    const noClientTitle = document.querySelector('#no-client');
  
    if (data.clients.length === 0) {
      clientsTable.style.display = 'none'
      noClientTitle.textContent = 'Aucun client'
    } else {
      noClientTitle.textContent = ''
      clientsTable.style.display = 'block'
    };
  }