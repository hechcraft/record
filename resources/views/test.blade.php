
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<link rel="stylesheet" href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006288/BBBootstrap/choices.min.css?version=7.0.0">
<script src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006273/BBBootstrap/choices.min.js?version=7.0.0"></script>
<div class="row d-flex justify-content-center mt-100">
    <div class="col-md-6"> <select id="choices-multiple-remove-button" placeholder="Select upto 5 tags" multiple>
            <option value="HTML">HTML</option>
            <option value="Jquery">Jquery</option>
            <option value="CSS">CSS</option>
            <option value="Bootstrap 3">Bootstrap 3</option>
            <option value="Bootstrap 4">Bootstrap 4</option>
            <option value="Java">Java</option>
            <option value="Javascript">Javascript</option>
            <option value="Angular">Angular</option>
            <option value="Python">Python</option>
            <option value="Hybris">Hybris</option>
            <option value="SQL">SQL</option>
            <option value="NOSQL">NOSQL</option>
            <option value="NodeJS">NodeJS</option>
        </select> </div>
</div>
<script>
    $(document).ready(function(){

        var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
            removeItemButton: true,
            maxItemCount:10,
            searchResultLimit:5,
            renderChoiceLimit:5
        });


    });
</script>
