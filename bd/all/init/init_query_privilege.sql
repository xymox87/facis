CREATE MATERIALIZED VIEW usuario AS SELECT &usuario FROM dual;

CREATE VIEW roles_usuario AS
SELECT granted_role FROM dba_role_privs WHERE grantee IN (SELECT * FROM usuario);

CREATE VIEW roles_roles AS
SELECT granted_role AS role FROM role_role_privs WHERE
role IN (SELECT * FROM roles_usuario);

CREATE VIEW permisos_roles AS
SELECT privilege FROM role_sys_privs WHERE role IN (SELECT * FROM roles_usuario)
OR role IN (SELECT * FROM roles_roles) UNION
SELECT privilege FROM role_tab_privs WHERE role IN (SELECT * FROM roles_usuario)
OR role IN (SELECT * FROM roles_roles);

CREATE VIEW permisos_usuario AS
SELECT privilege FROM dba_sys_privs WHERE grantee IN (SELECT * FROM usuario) UNION
SELECT privilege FROM dba_tab_privs WHERE grantee IN (SELECT * FROM usuario) UNION
SELECT privilege FROM dba_col_privs WHERE grantee IN (SELECT * FROM usuario);

CREATE VIEW privilegios_totales_usuario AS 
SELECT privilege FROM permisos_usuario UNION
SELECT privilege FROM permisos_roles;