<table>
						<form action="proses/peminjaman.php?proses=Add" method="POST">
								<input type="hidden" name="id_peminjaman" value="<?php echo $newID; ?>" readonly>
						<tr>
							<td class="td-tambah">tanggal peminjaman</td>
							<td class="td-tambah">:</td>
							<td class="td-tambah"><input type="date" name="tanggal_peminjaman"></td>
						</tr>
						<tr>
							<td class="td-tambah">tanggal pengembalian</td>
							<td class="td-tambah">:</td>
							<td class="td-tambah"><input type="date" name="tanggal_pengembalian"></td>
						</tr>
						<tr>
						<td style="position: relative;
									left: 10px;">status peminjaman</td>
									<td style="position: relative;
												left: 8px;">:</td>
							<td><select style="position: relative; left: 10px;" name="status_peminjaman">
									<option value="Pending">Pending</option>
                                    <option value="Dikonfirmasi">Dikonfirmasi</option>
                                    <option value="Dikembalikan">Dikembalikan</option>
                                    <option value="Ditolak">Ditolak</option>
								</select>
                            </td>
						</tr>
						<tr>
							<td class="td-tambah">id peminjam</td>
							<td class="td-tambah">:</td> 
							<td class="td-tambah"><select name="id_peminjam" >
										<?php
											$data = $lib->getPeminjam();
											foreach($data as $peminjam){
										?>
										<option value="<?=$peminjam[0]?>"><?=$peminjam[4]?></option>
										<?php
											}
										?>

										</select> <a href="#myBtn" id="myBtn">+</a></td>
						</tr>
						<tr><td class="td-tambah"><input type="submit" value="Tambah" name="proses"> <button class="button"><a href="peminjaman.php">Kembali</a></button></td></tr>
							</form>
						</table>
