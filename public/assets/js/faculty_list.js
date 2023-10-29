const facultyData = [
    { id: 1, idNo: 1, name: 'John Doe', subject: 'Computer Science', email: 'johndoe@example.com' },
    { id: 2, idNo: 2, name: 'Jane Smith', subject: 'Mathematics', email: 'janesmith@example.com' },
    // Add more faculty data as needed
];

// Function to update the table with faculty data
function updateTable() {
    const searchInput = document.getElementById('searchInput').value.toLowerCase();
    const tbody = document.querySelector('tbody');
    tbody.innerHTML = '';
    
    const filteredData = facultyData.filter(faculty => faculty.name.toLowerCase().includes(searchInput));
    
    filteredData.forEach((faculty, index) => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${index + 1}</td>
            <td>${faculty.idNo}</td>
            <td>${faculty.name}</td>
            <td>${faculty.subject}</td>
            <td>${faculty.email}</td>
            <td>
                <button type="button" class="btn btn-primary btn-sm view-button" data-toggle="modal" data-target="#viewModal">View</button>
                <button type="button" class="btn btn-success btn-sm edit-button" data-toggle="modal" data-target="#editModal">Edit</button>
                <button type="button" class="btn btn-danger btn-sm delete-button">Delete</button>
            </td>
        `;
        tbody.appendChild(row);
    });
}

// Initial table update
updateTable();

// Search input event listener
document.getElementById('searchInput').addEventListener('input', updateTable);
