<div class="basic-container white">
	<div class="row">
		<div class="col s12">
			<table>
				<tr>
					<td>No.</td>
					<td>Gaji Pokok</td>
					<td>Potongan</td>
					<td>Tambahan Lembur</td>
				</tr>
				<tr ng-repeat="d in data">
					<td>{{d.GajiPokok}}</td>
					<td>{{d.lembur}}</td>
					<td>{{d.potongan}}</td>
				</tr>
			</table>
		</div>
	</div>
</div>