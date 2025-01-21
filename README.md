* * *

### Descrição

O módulo **CRT0\\LockPanel** foi criado para bloquear o painel administrativo do Magento por meio de endpoints da API REST. Ele permite:

*   Bloquear/desbloquear o acesso ao painel.
*   Verificar o status de bloqueio.
*   Configurar usuários que não serão afetados pelo bloqueio.

* * *

### Instalação do Módulo

1.  **Copie os arquivos do módulo para o diretório do Magento:**
    
    
    `app/code/CRT0/LockPanel`
    
2.  **Ative o módulo:**
    
    
    `bin/magento module:enable CRT0_LockPanel`
    
3.  **Atualize o sistema:**
    
    `bin/magento setup:upgrade && bin/magento setup:di:compile`
    
    `bin/magento c:c`
    
4.  **Pronto!** O módulo está instalado.
    

* * *

### Configuração

1.  No painel do Magento, vá para `Stores > Configuration > CRT0 LockPanel`.
2.  Configure:
    *   **Ativar o Módulo:** Habilite o bloqueio administrativo.
    *   **Senha da API:** Defina a senha para acessar os endpoints.
    *   **Usuários Isentos:** Selecione usuários que poderão acessar o painel mesmo com o bloqueio.

* * *

### Endpoints Disponíveis

#### 1\. **Bloquear o Painel**

*   **Endpoint:** `POST /rest/V1/lockpanel/lock`
*   **Parâmetros (form data):**
    *   `password` (obrigatório): Senha configurada no painel.

**Exemplo usando cURL:**

bash

CopyEdit

`curl -X POST "https://sualoja.com/rest/V1/lockpanel/lock" \ -H "Content-Type: application/x-www-form-urlencoded" \ --data-urlencode "password=minhasenhaapi"`

* * *

#### 2\. **Desbloquear o Painel**

*   **Endpoint:** `POST /rest/V1/lockpanel/unlock`
*   **Parâmetros (form data):**
    *   `password` (obrigatório): Senha configurada no painel.

**Exemplo usando cURL:**

bash

CopyEdit

`curl -X POST "https://sualoja.com/rest/V1/lockpanel/unlock" \ -H "Content-Type: application/x-www-form-urlencoded" \ --data-urlencode "password=minhasenhaapi"`

* * *

#### 3\. **Consultar Status**

*   **Endpoint:** `GET /rest/V1/lockpanel/status`

**Exemplo usando cURL:**

bash

CopyEdit

`curl -X GET "https://sualoja.com/rest/V1/lockpanel/status" \ -H "Content-Type: application/json"`

**Resposta Possível:**

*   Painel bloqueado:
    
    json
    
    CopyEdit
    
    `{   "status": "locked" }`
    
*   Painel desbloqueado:
    
    json
    
    CopyEdit
    
    `{   "status": "unlocked" }`
    

* * *
* * *

### Description

The **CRT0\\LockPanel** module was created to lock the Magento admin panel via REST API endpoints. It allows:

* Lock/unlock access to the panel.
* Check lock status.
* Configure users who will not be affected by blocking.

* * *

### Module Installation

1. **Copy the module files to the Magento directory:**
    
    
    `app/code/CRT0/LockPanel`
    
2. **Activate the module:**
    
    
    `bin/magento module:enable CRT0_LockPanel`
    
3. **Update the system:**
    
    `bin/magento setup:upgrade && bin/magento setup:di:compile`
    
    `bin/magento c:c`
    
4. **Ready!** The module is installed.
    

* * *

### Settings

1. In the Magento dashboard, go to `Stores > Configuration > CRT0 LockPanel`.
2. Configure:
    * **Activate the Module:** Enable administrative blocking.
    * **API Password:** Set the password to access the endpoints.
    * **Exempt Users:** Select users who will be able to access the panel even if blocked.

* * *

### Testes

*   Use ferramentas como **Postman** ou **cURL** para testar os endpoints.
*   Certifique-se de que os parâmetros da senha sejam enviados no formato **form data** para os métodos `POST`.
