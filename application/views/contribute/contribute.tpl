	<div class="span9 bg-color-contribute">		<div class="contribute-form">		<form method='post' action="{url::site('contribute/switch')}" class="form-horizontal" id="contribute" >            		<div class="control-group">			<label class="control-label smaller-label">{__ t='How many power cuts <br/> did you witness today ?'}</label>			<div class="controls">							<select class="contribute" name="contribute">					<option value="Please select" selected="selected">{__ t='Please select'}</option>					<option value="1" >1</option>					<option value="2" >2</option>					<option value="3" >3</option>				</select>			<span class="label-contribute"><input type='checkbox' value="1" name='know' />	{__ t='I don"t know, I wasn"t in Douala'} </span>				<span class='success-tick'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>							</div>		</div>		<div class="grid1">		<div class='contribute-divider'>Powercut 1</div>		<div class="control-group">			<label class="control-label" for="input01">{__ t='How long did it last?'}</label>			<div class="controls">				<select class="contribute1" name="contribute1">				<option value="Please select" selected="selected">{__ t='-'}</option>				<option value="29" >{__ t='Less than 30Mins'}</option>				<option value="+30" >{__ t='About 30Mins'}</option>				<option value="+60" >{__ t='About 1 hour'}</option>				<option value="+120" >{__ t='About 2 hours'}</option>				<option value="+180" >{__ t='About 3 hours'}</option>				</select>							<span class="label-contribute">{__ t='Which part of town where you?'}</span>				<select class="contribute1-1" name="contribute1-1">					<option value="Please select" selected="selected">{__ t='-'}</option>					<option value="1" >{__ t='Douala I'}</option>					<option value="2" >{__ t='Douala II'}</option>					<option value="3" >{__ t='Douala III'}</option>					<option value="4" >{__ t='Douala IV'}</option>					<option value="5" >{__ t='Douala V'}</option>				</select>				 <span class='success-tick1'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>						</div>		</div> 		</div>		<div class="grid2">		<div class='contribute-divider'>Powercut 2</div>		<div class="control-group">			<label class="control-label" for="input01">{__ t='How long did it last?'}</label>			<div class="controls">				<select class="contribute2" name="contribute2">				<option value="Please select" selected="selected">{__ t='-'}</option>				<option value="29" >{__ t='Less than 30Mins'}</option>				<option value="+30" >{__ t='About 30Mins'}</option>				<option value="+60" >{__ t='About 1 hour'}</option>				<option value="+120" >{__ t='About 2 hours'}</option>				<option value="+180" >{__ t='About 3 hours'}</option>				</select>							<span class="label-contribute">{__ t='Which part of town where you?'}</span>				<select class="contribute2-1" name="contribute2-1">					<option value="Please select" selected="selected">{__ t='-'}</option>					<option value="1" >{__ t='Douala I'}</option>					<option value="2" >{__ t='Douala II'}</option>					<option value="3" >{__ t='Douala III'}</option>					<option value="4" >{__ t='Douala IV'}</option>					<option value="5" >{__ t='Douala V'}</option>				</select>				 <span class='success-tick2'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>						</div>		</div>		</div>		<div class="grid3">		<div class='contribute-divider'>Powercut 3</div>		<div class="control-group">			<label class="control-label" for="input01">{__ t='How long did it last?'}</label>			<div class="controls">				<select class="contribute3" name="contribute3">				<option value="Please select" selected="selected">{__ t='-'}</option>				<option value="29" >{__ t='Less than 30Mins'}</option>				<option value="+30" >{__ t='About 30Mins'}</option>				<option value="+60" >{__ t='About 1 hour'}</option>				<option value="+120" >{__ t='About 2 hours'}</option>				<option value="+180" >{__ t='About 3 hours'}</option>				</select>							<span class="label-contribute">{__ t='Which part of town where you?'}</span>				<select class="contribute3-1" name="contribute3-1">					<option value="Please select" selected="selected">{__ t='-'}</option>					<option value="1" >{__ t='Douala I'}</option>					<option value="2" >{__ t='Douala II'}</option>					<option value="3" >{__ t='Douala III'}</option>					<option value="4" >{__ t='Douala IV'}</option>					<option value="5" >{__ t='Douala V'}</option>				</select>				 <span class='success-tick3'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>						</div>		</div>		</div>			<div class="control-group">	<div class="">	<input type='submit' class="btn btn-large sbtn contribute-submit" name='submit' value="{__ t='Contribute to Feowl!'}"/>	<a href="#" onClick="javascript:reset_fields(this.form);" class='reset'>{__ t='reset'}</a></div>	</div>		<div class="endContainer" style="display:none;">		<div class="alert ">		<a class="close" data-dismiss="alert" href="#">&times;</a>z		</div>		</div>			</form>  				</div>	</div>	