<?php
          require_once "../procesos/conexion.php";
          $conexion=conexion();
          $cedula='0';
          $dia='14';
          $mes='08';
          $ano='2019';
          $sql1="SELECT registro_ingresos_aulas.id_ingreso,
                          usuarios_registrados.documento_cc,
                          carrera.nombre_carrera,
                          salones.numero_salon,
                          materias.descripcion_m,
                          estados_movimiento.estado_spcf,
                          registro_ingresos_aulas.hora,
                          registro_ingresos_aulas.fecha
              FROM registro_ingresos_aulas
                   JOIN usuarios_registrados ON usuarios_registrados.iduser = registro_ingresos_aulas.documento
                   JOIN materias ON materias.id_materia = registro_ingresos_aulas.materia
                   JOIN salones ON salones.id_salon = registro_ingresos_aulas.aula
                   JOIN estados_movimiento ON estados_movimiento.id_estado = registro_ingresos_aulas.movimiento
                   JOIN carrera ON carrera.idcarrera = usuarios_registrados.carrera
                   WHERE registro_ingresos_aulas.fecha = ('$ano''-''$mes''-''$dia')
                   AND usuarios_registrados.documento_cc = '$cedula'
                   ORDER BY registro_ingresos_aulas.id_ingreso ASC";
                    $result1=mysqli_query($conexion,$sql1);
                    tablet($result1,$sql1,$conexion);
                    ?>
                    <?php
                    function tablet($result1,$sql1,$conexion){?>
                      <tr>
                        <th>Id. Acceso</th>
                        <th>Id. Usuario</th>
                        <th>Carrera</th>
                        <th>Aula</th>
                        <th>Materia</th>
                        <th>Movimiento</th>
                        <th>Hora</th>
                        <th>Fecha</th>
                      </tr>
                      <?php while ($ver1=mysqli_fetch_row($result1)):?>
                      <tr>
                        <th><?php echo $ver1[0]; ?></th>
                        <th><?php echo $ver1[1]; ?></th>
                        <th><?php echo $ver1[2]; ?></th>
                        <th><?php echo $ver1[3]; ?></th>
                        <th><?php echo $ver1[4]; ?></th>
                        <th><?php echo $ver1[5]; ?></th>
                        <th><?php echo $ver1[6]; ?></th>
                        <th><?php echo $ver1[7]; ?></th>
                      </tr>
                    <?php endwhile;
                  return 1;
                    }


 ?>
