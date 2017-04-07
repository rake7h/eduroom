<form class="form-signup" name="signup_form" action="components/addinstitute_action.php" method="post">
    <div class="form-group">
        <div class="row">
            
            <div class="col-md-6">
                <label>Institute name</label>
                <div class="row">

	<div class="col-md-12 text-center"><br/>
		<input class="typeahead form-control" type="text" name="inst_txt">
    </div>
</div>


	<script>
		$('input.typeahead').typeahead({
			source:  function (query, process) {
				return $.get('components/college_sugg.php', { query: query }, function (data) {
		        	//console.log(data);
					data = $.parseJSON(data);
					return process(data);
				});
			}
		});
	</script>
                <br>
                <label>Course *</label>
                <select class="form-control" id="sel1" name="course_txt">
                    <option>Bachelor of engineering(B.E.)</option>
                    <option>Bachelor of technology(B.Tech.)</option>
                    <option>Master of technology(M.Tech.)</option>


                </select>
                <br>
                <!--label>Course *</label>
                <input type="text" class="form-control" name="course_txt">
                <br-->
                <label>Stream *</label>
                <select class="form-control" id="sel1" name="stream_txt">
                    <option>Computer science</option>
                    <option>Electronics</option>
                    <option>Electical</option>
                    <option>Mechanical engineering </option>                                        <option>Electrical engineering</option>
                    <option>Civil engineering </option>
                </select>

            
                <div class="form-group">
                    <label>Class (passout year)</label>
                    <select class="form-control" id="sel1" name="batch_txt">
                        <option>2016</option>
                        <option>2017</option>
                        <option>2018</option>
                        <option>2019</option>
                        <option>2020</option>
                    </select>
                </div>
                <label>Location (optional)</label>
                <input type="search" id="address" class="form-control" name="location_txt" />
                <br>
                <div>
                    <br>
                </div>
                <button class="btn btn-default" type="submit" name="subbttn">Save</button>
                