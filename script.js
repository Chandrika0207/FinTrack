function toggleBox(titleElement) {
    const box = titleElement.parentElement;
    const content = box.querySelector('.entity-content');
    content.style.display = content.style.display === 'block' ? 'none' : 'block';
  }
  
  // Function to handle form submissions (Insertion or Deletion)
  async function handleFormSubmission(event, action) {
    event.preventDefault();  // Prevent the form from submitting the traditional way
    const form = event.target;
    const formData = new FormData(form);  // Collect form data
  
    // Construct a plain object from FormData for sending in the request body
    const data = {};
    formData.forEach((value, key) => {
      data[key] = value;
    });
  
    // Determine the URL based on the action (insert or delete)
    let url = '';
    if (action === 'insert') {
      if (form.classList.contains('supplier-form')) {
        url = 'supplier_insert.php';
      } else if (form.classList.contains('products-form')) {
        url = 'products_insert.php';
      } else if (form.classList.contains('customer-form')) {
        url = 'customer_insert.php';
      } else if (form.classList.contains('bill-form')) {
        url = 'bill_insert.php';
      }
    } else if (action === 'delete') {
      if (form.classList.contains('supplier-form')) {
        url = 'supplier_delete.php';
      } else if (form.classList.contains('products-form')) {
        url = 'products_delete.php';
      } else if (form.classList.contains('customer-form')) {
        url = 'customer_delete.php';
      } else if (form.classList.contains('bill-form')) {
        url = 'bill_delete.php';
      }
    }
  
    // Send the form data using fetch API
    try {
      const response = await fetch(url, {
        method: 'POST',
        body: JSON.stringify(data),
        headers: {
          'Content-Type': 'application/json'
        }
      });
  
      const result = await response.json();  // Assuming server responds with JSON
  
      if (response.ok) {
        alert(result.message);  // Notify user of success
      } else {
        alert(`Error: ${result.message}`);
      }
    } catch (error) {
      console.error('Error during form submission:', error);
      alert('An error occurred. Please try again.');
    }
  }
  
  // Attach event listeners to each form for handling submission
  document.addEventListener('DOMContentLoaded', function () {
    // Supplier form event listeners
    const supplierInsertForm = document.querySelector('.supplier-form');
    const supplierDeleteForm = document.querySelector('.supplier-delete-form');
    
    if (supplierInsertForm) {
      supplierInsertForm.addEventListener('submit', function (e) {
        handleFormSubmission(e, 'insert');
      });
    }
  
    if (supplierDeleteForm) {
      supplierDeleteForm.addEventListener('submit', function (e) {
        handleFormSubmission(e, 'delete');
      });
    }
  
    // Product form event listeners
    const productInsertForm = document.querySelector('.products-form');
    const productDeleteForm = document.querySelector('.products-delete-form');
    
    if (productInsertForm) {
      productInsertForm.addEventListener('submit', function (e) {
        handleFormSubmission(e, 'insert');
      });
    }
  
    if (productDeleteForm) {
      productDeleteForm.addEventListener('submit', function (e) {
        handleFormSubmission(e, 'delete');
      });
    }
  
    // Customer form event listeners
    const customerInsertForm = document.querySelector('.customer-form');
    const customerDeleteForm = document.querySelector('.customer-delete-form');
    
    if (customerInsertForm) {
      customerInsertForm.addEventListener('submit', function (e) {
        handleFormSubmission(e, 'insert');
      });
    }
  
    if (customerDeleteForm) {
      customerDeleteForm.addEventListener('submit', function (e) {
        handleFormSubmission(e, 'delete');
      });
    }
  
    // Bill form event listeners
    const billInsertForm = document.querySelector('.bill-form');
    const billDeleteForm = document.querySelector('.bill-delete-form');
    
    if (billInsertForm) {
      billInsertForm.addEventListener('submit', function (e) {
        handleFormSubmission(e, 'insert');
      });
    }
  
    if (billDeleteForm) {
      billDeleteForm.addEventListener('submit', function (e) {
        handleFormSubmission(e, 'delete');
      });
    }
  });
  