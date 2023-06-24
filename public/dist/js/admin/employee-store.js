"use strict";

$(document).ready(function () {

    $('#contact-form-add').on('click', function () {

        let total_element = $(".contact-row").length;
        let lastId = $(".contact-row:last").attr("id");
        let split_id = lastId.split("_");
        let nextIndex = Number(split_id[1]) + 1;
        let max = 5; // if you can change this value for contact address

        if (total_element < max) {

            $(".contact-row:last").after("<div class='row contact-row' id='row_" + nextIndex + "'></div>");

            $("#row_" + nextIndex).append(`
                <div class="mb-3 col-md-10">
                    <label class="form-label">Contact Name</label>
                    <input type="text" name="contacts[${nextIndex}][contact_name]" class="form-control"
                        placeholder="Contact Name">
                </div>
                <div class="mb-3 col-md-10">
                    <label class="form-label">Contact Email</label>
                    <input type="email" name="contacts[${nextIndex}][contact_email]" class="form-control"
                        placeholder="Contact Email">
                </div>
                <div class="col-md-2">
                    <span id='remove_${nextIndex}' class='remove'>X</span>
                </div>

            `);

        }

    });

    // Remove element
    $('.row').on('click', '.remove', function () {

        let total_element = $(".contact-row").length;
        if (total_element > 1) {
            let id = this.id;
            let split_id = id.split("_");
            let deleteIndex = split_id[1];
            $("#row_" + deleteIndex).remove();
        }

    });
});