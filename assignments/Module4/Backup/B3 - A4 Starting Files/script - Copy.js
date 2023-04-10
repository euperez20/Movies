/******w**************
    
    Assignment 4 Javascript
    Name: Eunice Perez
    Date: February 12, 2023
    Description:

*********************/


// Listener to search in the form
window.onload = function() {
  var form = document.getElementById('search-form');
  
  form.addEventListener('submit', async (event) => {
  event.preventDefault(); 

  // Get data from the form
  var neighbourhood = document.getElementById('neighbourhood').value;

  // Build API URL with form data
  var apiUrl = 'https://data.winnipeg.ca/resource/tx3d-pfxq.json?';

  if (neighbourhood) {
    apiUrl += `$where=neighbourhood = '${neighbourhood}'`;

  }

  apiUrl += '&$order=park_name DESC&$limit=100';

  // let encodedURL = encodeURI(apiUrl);
 

  // Call API

  try {
    var response = await fetch(apiUrl);
    var data = await response.json();
    displayResults(data);
  } catch (error) {
    console.error(error);

  }

});

// Display results in the form
var displayResults = (data) => {
  var resultsContainer = document.getElementById('results'); 

  // Clear previous results
  resultsContainer.innerHTML = ''; 

  // If no results, display message
  if (!data.length) {
    resultsContainer.innerHTML = 'No results found.';
    return;

  }

  // Create table
       
  const main = document.getElementById("search-container");
  const h1 = document.createElement("h1");
  const table = document.createElement("table");
  const tableHead = document.createElement("thead");
  const tableHeadRow = document.createElement("tr");
  const tableBody = document.createElement("tbody");    

// Assign values

  h1.innerHTML = "Results";
  main.appendChild(h1);
  main.appendChild(table);
  table.appendChild(tableHead);
  tableHead.appendChild(tableHeadRow);
  table.appendChild(tableBody);

  // Add table headers
  const headers = ["ID", "Park Name", "Location", "Category", "District", "Neighbourhood"];
  headers.forEach(header => {
  const th = document.createElement("th");
  th.innerHTML = header;
  tableHeadRow.appendChild(th);
  });

  // Add table rows
  data.forEach(item => {
    const tableRow = document.createElement("tr");
    tableBody.appendChild(tableRow);
    const values = [item.park_id, item.park_name, item.location_description, item.park_category, item.district, item.neighbourhood];
    values.forEach(value => {
    const td = document.createElement("td");
    td.innerHTML = value;
    tableRow.appendChild(td);

  });

});

}

}

