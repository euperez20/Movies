
// Add event listener to search form

const form = document.getElementById('search-form');

form.addEventListener('submit', async (event) => {

  event.preventDefault();

 

  // Get form data

  const primary_street = document.getElementById('primary_street').value;

 

  // Build API URL with form data

  let apiUrl = 'https://data.winnipeg.ca/resource/lane_closure.json?';

  if (primary_street) {

    apiUrl += `$where=primary_street='${primary_street}'`;

  }

 

  apiUrl += '&$order=date_closed_from DESC&$limit=100';

 

 

  // Call API

  try {

    const response = await fetch(apiUrl);

    const data = await response.json();

    displayResults(data);

  } catch (error) {

    console.error(error);

  }

});

// Display results in HTML

const displayResults = (data) => {

  const resultsContainer = document.getElementById('results');

 

  // Clear previous results

  resultsContainer.innerHTML = '';

 

  // If no results, display message

  if (!data.length) {

    resultsContainer.innerHTML = 'No results found.';

    return;

  }

 

  // Create table to display results

        // Declaring variables

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

        const headers = ["primary_stree", "boundaries", "direction", "date_closed_from", "date_closed_to", "traffic_effect", "organization", "time_closed_from", "time_closed_to"];

        headers.forEach(header => {

          const th = document.createElement("th");

          th.innerHTML = header;

          tableHeadRow.appendChild(th);

        });

     

        // Add table rows

        data.forEach(item => {

          const tableRow = document.createElement("tr");

          tableBody.appendChild(tableRow);

          const values = [item.primary_stree, item.boundaries, item.direction, item.date_closed_from, item.date_closed_to, item.traffic_effect, item.organization, item.time_closed_from, item.time_closed_to];

          values.forEach(value => {

            const td = document.createElement("td");

            td.innerHTML = value;

            tableRow.appendChild(td);

          });

        });

      }