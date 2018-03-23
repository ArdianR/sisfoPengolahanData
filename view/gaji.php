<br>
<div class="basic-container white">
	<br>
	<div class="row">
		<div class="col s8 offset-s2">
			<h4>Data Master Gaji</h4>
			<br><br>
			<table class="striped">
				<tr>
					<td>No.</td>
					<td>Gaji Pokok</td>
					<td>Potongan</td>
					<td>Tambahan Lembur</td>
					<td></td>
				</tr>
				<tr ng-repeat="d in data" ng-init="x=0">
					<td>{{x+1}}</td>
					<td>Rp.{{gaji}}</td>
					<td>Rp.{{potongan}}</td>
					<td>Rp.{{lembur}}</td>
					<td><a href="" class="btn blue"><i class="material-icons">mode_edit</i></a></td>
				</tr>
			</table>
		</div>
	</div>
</div>