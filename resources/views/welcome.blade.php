<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PWL 2024</title>
        <style>
            * { margin: 0; padding: 0; box-sizing: border-box; }
            body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 100vh; display: flex; align-items: center; justify-content: center; }
            .container { background: white; padding: 50px; border-radius: 15px; box-shadow: 0 20px 60px rgba(0,0,0,0.3); max-width: 800px; text-align: center; }
            h1 { color: #333; margin-bottom: 10px; font-size: 36px; }
            .subtitle { color: #666; margin-bottom: 40px; font-size: 18px; }
            .projects { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px; margin-top: 40px; }
            .project-card { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 30px; border-radius: 10px; color: white; cursor: pointer; transition: transform 0.3s, box-shadow 0.3s; text-decoration: none; }
            .project-card:hover { transform: translateY(-5px); box-shadow: 0 15px 40px rgba(102, 126, 234, 0.4); }
            .project-card h3 { margin-bottom: 15px; font-size: 24px; }
            .project-card p { margin-bottom: 20px; font-size: 14px; opacity: 0.9; }
            .btn { display: inline-block; background: rgba(255,255,255,0.2); color: white; padding: 10px 25px; border-radius: 25px; text-decoration: none; font-weight: 600; border: 2px solid white; transition: all 0.3s; }
            .btn:hover { background: white; color: #667eea; }
            .pos-card { background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); }
            .footer { margin-top: 40px; color: #999; font-size: 14px; }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>🎓 PWL 2024</h1>
            <p class="subtitle">Pemrograman Web Lanjut 2024</p>
            
            <div class="projects">
                <a href="/hello" class="project-card" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    <h3>📚 Main Project</h3>
                    <p>Basis pembelajaran Laravel fundamental</p>
                    <span class="btn">Buka</span>
                </a>
                
                <a href="http://localhost:8002" class="project-card pos-card">
                    <h3>🛒 POS System</h3>
                    <p>Sistem Point of Sale dengan database lengkap</p>
                    <span class="btn">Buka</span>
                </a>
            </div>

            <div class="footer">
                <p><strong>Shortcut URLs:</strong></p>
                <p>Main: <code>localhost</code> | POS: <code>localhost:8002</code></p>
            </div>
        </div>
    </body>
</html>