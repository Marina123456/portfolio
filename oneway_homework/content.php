<?php foreach ($row as $train): ?>
<tr class="dataTr" id="train_<?echo $train->key_way;?>" onclick="open_bron(<?echo $train->key_way;?>);">
	<td class="train">
		<div class="numTrain"><?echo $train->numberTrain;?></div>
			<div class="infoTrain">
				<span class="nameTrain" ><?echo $train->otkuda;?>-<?echo $train->kuda;?></span>
				<br>
				<div class="typeTrain"><?echo $train->typeTrain;?></div>							 
			</div>
		<div class="clearAll"></div>
	</td>
	<td class=""><?echo $train->numberWay;?></td>
	<td><?echo $train->dtFrom;?></td>
	<td><?echo $train->dtTo;?></td>
	<td><?echo $train->countOpenMest;?></td>
	<td >
		<div style="display:block;" class="buyTicket" id="buttBuy_<?echo $train->key_way;?>" onclick="">Купить билет</div>
	</td>
	
</tr>
<tr>
	<td colspan="6" id="bron_<?echo $train->key_way;?>" style="display:none;">
		<form class="formBron" id="formBron_<?echo $train->key_way;?>" action="javascript:bronJS('formBron_<?echo $train->key_way;?>',<?echo $train->key_way;?>);">
			<div class="mapAll"> 
				<img class="mapTrain" src="./icons/mapTrain.png">
					<div class="divMap" style="" id="divMap_<?echo $train->key_way;?>">
						<div class="divMapTr" style="">
							<?for ($i = 1; $i <= 40; $i++):?>
									<?if ($i % 2 != 0) continue;?>
									<?if (in_array($i, $train->zabronMesta)):?>
										<div class="cellMapClose cellmap" style=""  onclick="vibor_mest(this,<?echo $train->key_way;?>);">
											<? if(strlen($i) <2) echo '0' . $i; else echo $i;?>											
										</div>
									<?else:?>
										<div class="cellMapOpen cellmap" style=""  onclick="vibor_mest(this,<?echo $train->key_way;?>);">
											<? if(strlen($i) <2) echo '0' . $i; else echo $i;?>											
										</div>
									<?endif;?>
							<?endfor;?>
						</div>
						<div class="divMapTrTwo" style="">
							<?for ($i = 1; $i <= 40; $i++):?>
								<?if ($i % 2 == 0) continue;?>
								<?if (in_array($i, $train->zabronMesta)):?>
									<div class="cellMapClose cellmap" style=""  onclick="vibor_mest(this,<?echo $train->key_way;?>);">
										<? if(strlen($i) <2) echo '0' . $i; else echo $i;?>	
									</div>
								<?else:?>
									<div class="cellMapOpen cellmap" style=""  onclick="vibor_mest(this,<?echo $train->key_way;?>);">
										<? if(strlen($i) <2) echo '0' . $i; else echo $i;?>	
									</div>
								<?endif;?>
							<?endfor;?>
							</div>
						</div>
				</img>
			</div>
			<div class="selectPlace">
				<div class="titleSelPlace" id="titleSelPlace_<?echo $train->key_way;?>">Пока вы не выбрали мест</div>
				<br>
				<div class="allSelPlace" id="allSelPlace_<?echo $train->key_way;?>"></div><!--18, 20 места-->
			</div>
			<div class="clearAll"></div>
				<div class="inputInfo">
					<input required id="inputTelephone<?echo $train->key_way;?>" placeholder="Телефон" class="inputTelephone" name="telephone">
					<span id="inputTelephone<?echo $train->key_way;?>ValidationMessage" class="validationMessage validFirst"></span>
					<input required type="e-mail" class="emailInp" id="inputEmail<?echo $train->key_way;?>" placeholder="E-mail" name="email">
					<span id="inputEmail<?echo $train->key_way;?>ValidationMessage" class="validationMessage validFirst"></span>
					<div class="clearAll"></div>
					<br>
					<div class="fioInp">
						<input required class="fioF"  id="inputFam<?echo $train->key_way;?>" placeholder="Фамилия" name="fam">
						<input required class="fioN"  id="inputName<?echo $train->key_way;?>" placeholder="Имя" name="imya">
						<input required class="fioOt" id="inputOt<?echo $train->key_way;?>" placeholder="Отчество" name="otchestvo">
						<input required class="dataRogd" id="inputDataRogd<?echo $train->key_way;?>" placeholder="Дата рождения" name="dt_birth" style="margin-left: 39px;  width: 18%;">
						<div class="polInp">
							<input id="polМen<?echo $train->key_way;?>" type="radio" name="pol" class="chekInp" value="м">
							<label for="polМen<?echo $train->key_way;?>">М</label>
							<input checked id="polFem<?echo $train->key_way;?>" type="radio" name="pol" class="chekInp" value="ж">
							<label for="polFem<?echo $train->key_way;?>">Ж</label>
						</div>	
									
						<span id="inputFam<?echo $train->key_way;?>ValidationMessage" class="validationMessage"></span>
						<span id="inputName<?echo $train->key_way;?>ValidationMessage" class="validationMessage"></span>
						<span id="inputOt<?echo $train->key_way;?>ValidationMessage" class="validationMessage inputOtValidationMessage"></span>
						<span id="inputDataRogd<?echo $train->key_way;?>ValidationMessage" class="validationMessage"></span>								
									
					</div>
					<div class="clearAll"></div>
																
					<div class="pasportInfo">
						<input required class="grazhd" id="inputGrazh<?echo $train->key_way;?>" placeholder="Гражданство" name="grazhd">
						<input required class="seriaPas notLeft" id="inputSeriaPas<?echo $train->key_way;?>" placeholder="Серия и № документа" name="seria_passp">
						<input required class="deistvie notLeft" id="inputDeistvie<?echo $train->key_way;?>" placeholder="Действует до" style="width: 26%;" name="deistvuet_do">
						<div class="clearAll"></div>
						<span id="inputGrazh<?echo $train->key_way;?>ValidationMessage" class="validationMessage"></span>
						<span id="inputSeriaPas<?echo $train->key_way;?>ValidationMessage" class="validationMessage"></span>
						<span id="inputDeistvie<?echo $train->key_way;?>ValidationMessage" class="validationMessage"></span>
					</div>
					<div class="clearAll"></div>
					<input class="subBron" type="submit" value="Забронировать">
				</div>
		</form>
		
	</td>
</tr>		
<?php endforeach; ?>