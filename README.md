# PHP Toolbox + Laravel Integration

Um conjunto de ferramentas utilitárias robustas desenvolvidas em PHP 8.3+, integradas nativamente a um dashboard Laravel. Este projeto demonstra a criação de uma biblioteca independente (`src/`) sendo orquestrada por um framework moderno.

## Funcionalidades Atuais

- **Buscador de CEP**: Integração com a API ViaCEP para localização de endereços brasileiros.
- **Uptime Checker**: Verificador de status de sites em tempo real com métricas de tempo de resposta via Guzzle.
- **String Helper**: Utilitários para manipulação de strings, como geração de slugs para SEO.
- **Dashboard Visual**: Interface administrativa construída com Laravel Blade e Tailwind CSS.

## Stack Técnica

- **Linguagem:** PHP 8.3
- **Framework:** Laravel 11 / 12
- **HTTP Client:** Guzzle (requisições assíncronas e tratamento de stats)
- **Testes:** PHPUnit
- **Frontend:** Tailwind CSS

## Estrutura do Projeto

O projeto segue uma arquitetura híbrida onde a lógica de negócio reside em uma pasta isolada, permitindo portabilidade:

```text
├── app/            # Camada de Orquestração (Laravel)
├── src/            # Core do Toolbox (Library Independente)
│   ├── Api/        # Integrações com APIs externas
│   └── Utils/      # Helpers e Ferramentas Utilitárias
├── tests/          # Testes Unitários e Funcionais
└── routes/         # Endpoints da aplicação
```

# Instalação e Uso

Clonar o repositório:

```Bash
git clone https://github.com/thinkbruno/php-toolbox.git
```

## Instalar dependências:

```Bash
composer install
```

Configurar o ambiente:

```Bash
cp .env.example .env
php artisan key:generate
```

Executar o servidor:

```Bash
php artisan serve
```

Executar Testes:

```Bash
php artisan test
```

# Autor

Bruno Ramos
Portfólio : [brunoramos.tec.br](https://brunoramos.tec.br/)
