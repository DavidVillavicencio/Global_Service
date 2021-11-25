Reglas de negocio
añadi el crud basico para la clase usuario
en agregar validar que el email no se repita?.



tal vez en buscar usar los parametros nombre,apellido,email, no la contraseña 



<?php
            for ($i = 0; $i < $user; $i++) {
              foreach ($user[$i] as $us => $valor) {
            ?>


                <tr class="tableInfo">
                  <td>
                    <span><?php $us->nombre ?></span>
                  </td>
                  <td>
                    <span><?php $us->apellido ?></span>
                  </td>
                  <td>
                    <span><?php $us->email ?></span>
                  </td>
                  <td>
                    <span><?php $us->contraseña ?></span>
                  </td>
                  <td>
                    <div class="button">
                      <button class="buttonEdit" type="button" data-bs-toggle="modal" data-bs-target="#modalEditar">
                        Editar
                      </button>
                      <button class="buttonDelete" type="submit">
                        <img class="imgDelete" src="../public/img/delete.svg" alt="">
                      </button>
                    </div>

                  </td>
                </tr>

            <?php
              };
            }
            ?>