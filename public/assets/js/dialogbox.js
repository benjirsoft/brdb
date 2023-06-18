function confirmDelete(categoryId) {
    var confirmBox = document.createElement('div');
    confirmBox.classList.add('confirm-box');

    var message = document.createElement('h2');
    message.textContent = 'Are you sure you want to delete this category?';
    confirmBox.appendChild(message);

    var yesButton = document.createElement('button');
    yesButton.textContent = 'Yes';
    yesButton.addEventListener('click', function() {
      window.location.href = "{{ url('deletecategory') }}/" + categoryId;
    });
    confirmBox.appendChild(yesButton);

    var noButton = document.createElement('button');
    noButton.textContent = 'No';
    noButton.addEventListener('click', function() {
      confirmBox.remove();
    });
    confirmBox.appendChild(noButton);

    document.body.appendChild(confirmBox);

    return false;
}