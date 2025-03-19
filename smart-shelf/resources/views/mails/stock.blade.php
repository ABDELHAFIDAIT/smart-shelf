<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alerte de Stock - Smart Shelf</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            text-align: center;
            padding: 20px 0;
            border-bottom: 2px solid #f3f4f6;
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .logo-taxi { color: #f59e0b; }
        .logo-wsselni { color: #2563eb; }
        .content {
            padding: 20px 0;
        }
        .details {
            background-color: #f3f4f6;
            padding: 15px;
            border-radius: 8px;
            margin: 20px 0;
        }
        .footer {
            text-align: center;
            padding-top: 20px;
            border-top: 2px solid #f3f4f6;
            font-size: 14px;
            color: #666;
        }
        .button {
            display: inline-block;
            background-color: #2563eb;
            color: white;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 6px;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="https://raw.githubusercontent.com/ABDELHAFIDAIT/smart-shelf/refs/heads/main/smart-shelf/public/logo.png" alt="Logo de Smart Shelf" class="h-16">
        </div>
    </div>

    <div class="content">
        <h2>Alerte de Stock Minimale</h2>
        
        <p>Bonjour Admin,</p>
        
        <p>Le Stock du Produit avec le Nom : {{ $name }}, a atteint le Stock Minimale. Voici les détails du Produit :</p>
        
        <div class="details">
            <p><strong>Nom :</strong> {{ $name }}</p>
            <p><strong>Description :</strong> {{ $description }}</p>
            <p><strong>Catégorie :</strong> {{ $category }}</p>
            <p><strong>N° Rayon :</strong> {{ $rayon }}</p>
            <p><strong>Prix Unitaire :</strong> {{ number_format($price, 2) }} MAD</p>
            <p><strong>Stock Actuelle :</strong> {{ $stock }}</p>
            <p><strong>Stock Minimale :</strong> {{ $min_stock }}</p>
        </div>

        <p>Pensez à incrémenter et modifier la quantité de ce produit en stock.</p>
    </div>

    <div class="footer">
        <p>© {{ date('Y') }} SmartShelf. Tous droits réservés.</p>
    </div>
</body>
</html>