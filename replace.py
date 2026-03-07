import re

with open('index.html', 'r', encoding='utf-8') as f:
    content = f.read()

replacement = """    <!-- Procedures Accordion Section -->
    <section class="services-accordion-section bg-off-white" id="procedimientos">
        <h2 class="section-title text-center mb-5 pt-5 gs-fade-up">Cirugía plástica estética y cirugía reconstructiva</h2>
        
        <div class="services-accordion gs-fade-up">
            <!-- Panel 1 -->
            <div class="accordion-panel" style="background-image: url('https://images.unsplash.com/photo-1512413917909-ebcc12b9a7be?q=80&w=800&auto=format&fit=crop');">
                <a href="#contacto" class="panel-link"></a>
                <h3 class="panel-title">ROSTRO</h3>
            </div>
            <!-- Panel 2 -->
            <div class="accordion-panel" style="background-image: url('https://images.unsplash.com/photo-1588513706496-bf75c5dd9ba3?q=80&w=800&auto=format&fit=crop');">
                <a href="#contacto" class="panel-link"></a>
                <h3 class="panel-title">LABIOS</h3>
            </div>
            <!-- Panel 3 -->
            <div class="accordion-panel" style="background-image: url('https://images.unsplash.com/photo-1596755389378-c31d21fd1273?q=80&w=800&auto=format&fit=crop');">
                <a href="#contacto" class="panel-link"></a>
                <h3 class="panel-title">NARIZ</h3>
            </div>
            <!-- Panel 4 -->
            <div class="accordion-panel" style="background-image: url('https://images.unsplash.com/photo-1616683693504-3ea7e9ad6fec?q=80&w=800&auto=format&fit=crop');">
                <a href="#contacto" class="panel-link"></a>
                <h3 class="panel-title">BÓTOX</h3>
            </div>
            <!-- Panel 5 -->
            <div class="accordion-panel" style="background-image: url('https://images.unsplash.com/photo-1506863530036-1ef0d46410f5?q=80&w=800&auto=format&fit=crop');">
                <a href="#contacto" class="panel-link"></a>
                <h3 class="panel-title">CABELLO</h3>
            </div>
        </div>

        <div class="container pb-5">
            <div class="text-center mt-5 gs-fade-up">
                <p class="mb-3 tracking-wide text-uppercase small">Conoce más sobre nuestros procedimientos:</p>
                <div class="procedure-links d-flex justify-content-center flex-wrap gap-4">
                    <a href="#" class="minimal-link">Bichectomía</a>
                    <a href="#" class="minimal-link">Abdominoplastia</a>
                    <a href="#" class="minimal-link">Rinoplastia</a>
                    <a href="#" class="minimal-link">Liposucción</a>
                </div>
            </div>
        </div>
    </section>"""

start_str = '    <!-- Procedures Section -->\n    <section class="procedures-section py-5 bg-off-white" id="procedimientos">'
end_str = '    </section>\n\n    <!-- Specific Procedure Section (Aumento de Busto) -->'

start_idx = content.find(start_str)
end_idx = content.find(end_str)

if start_idx != -1 and end_idx != -1:
    new_content = content[:start_idx] + replacement + "\n\n" + content[end_idx + len('    </section>\n\n'):]
    with open('index.html', 'w', encoding='utf-8') as f:
        f.write(new_content)
    print("Replaced successfully")
else:
    print("Could not find start or end index")

