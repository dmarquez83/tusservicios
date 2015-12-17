select a.horario,
                            (SELECT c.descripcion AS curso
                                FROM horario AS h, horario_cursos hc, horario_rel AS hr, dias AS d, horas AS ho, curso AS c
                                WHERE h.id = hr.id_horario
                                AND hc.id = hr.id_horario_curso
                                AND hc.id_dia = d.id
                                AND hc.id_hora = ho.id
                                AND h.id_curso = c.id
                                AND hc.id_dia = 1
                                AND hc.id_hora=a.id) as lunes,
                            (SELECT c.descripcion AS curso
                                FROM horario AS h, horario_cursos hc, horario_rel AS hr, dias AS d, horas AS ho, curso AS c
                                WHERE h.id = hr.id_horario
                                AND hc.id = hr.id_horario_curso
                                AND hc.id_dia = d.id
                                AND hc.id_hora = ho.id
                                AND h.id_curso = c.id
                                AND hc.id_dia = 2
                                AND hc.id_hora=a.id) as martes,
                            (SELECT c.descripcion AS curso
                                FROM horario AS h, horario_cursos hc, horario_rel AS hr, dias AS d, horas AS ho, curso AS c
                                WHERE h.id = hr.id_horario
                                AND hc.id = hr.id_horario_curso
                                AND hc.id_dia = d.id
                                AND hc.id_hora = ho.id
                                AND h.id_curso = c.id
                                AND hc.id_dia = 3
                                AND hc.id_hora=a.id) as miercoles,
                            (SELECT c.descripcion AS curso
                                FROM horario AS h, horario_cursos hc, horario_rel AS hr, dias AS d, horas AS ho, curso AS c
                                WHERE h.id = hr.id_horario
                                AND hc.id = hr.id_horario_curso
                                AND hc.id_dia = d.id
                                AND hc.id_hora = ho.id
                                AND h.id_curso = c.id
                                AND hc.id_dia = 4
                                AND hc.id_hora=a.id) as jueves,
                            (SELECT c.descripcion AS curso
                                FROM horario AS h, horario_cursos hc, horario_rel AS hr, dias AS d, horas AS ho, curso AS c
                                WHERE h.id = hr.id_horario
                                AND hc.id = hr.id_horario_curso
                                AND hc.id_dia = d.id
                                AND hc.id_hora = ho.id
                                AND h.id_curso = c.id
                                AND hc.id_dia = 5
                                AND hc.id_hora=a.id) as viernes,
                            (SELECT c.descripcion AS curso
                                FROM horario AS h, horario_cursos hc, horario_rel AS hr, dias AS d, horas AS ho, curso AS c
                                WHERE h.id = hr.id_horario
                                AND hc.id = hr.id_horario_curso
                                AND hc.id_dia = d.id
                                AND hc.id_hora = ho.id
                                AND h.id_curso = c.id
                                AND hc.id_dia = 6
                                AND hc.id_hora=a.id) as sabado,
                            (SELECT c.descripcion AS curso
                                FROM horario AS h, horario_cursos hc, horario_rel AS hr, dias AS d, horas AS ho, curso AS c
                                WHERE h.id = hr.id_horario
                                AND hc.id = hr.id_horario_curso
                                AND hc.id_dia = d.id
                                AND hc.id_hora = ho.id
                                AND h.id_curso = c.id
                                AND hc.id_dia = 7
                                AND hc.id_hora=a.id) as domingo
                            from
                            horas as a
                            order by a.id
