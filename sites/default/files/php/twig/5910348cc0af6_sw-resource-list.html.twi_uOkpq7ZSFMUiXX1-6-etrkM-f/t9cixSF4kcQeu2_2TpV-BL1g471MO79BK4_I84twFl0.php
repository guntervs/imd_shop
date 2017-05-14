<?php

/* modules/custom/imd_shop/templates/sw-resource-list.html.twig */
class __TwigTemplate_7173645892b7b9feecdb9438e427621dd57a3e8e1118f0f45310d805a582b0d8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $tags = array("for" => 2);
        $filters = array("capitalize" => 4);
        $functions = array("path" => 4);

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('for'),
                array('capitalize'),
                array('path')
            );
        } catch (Twig_Sandbox_SecurityError $e) {
            $e->setTemplateFile($this->getTemplateName());

            if ($e instanceof Twig_Sandbox_SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

        // line 1
        echo "<ul>
    ";
        // line 2
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["list"]) ? $context["list"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 3
            echo "        <li>
            <a href=\"";
            // line 4
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->env->getExtension('drupal_core')->getPath("imd_shop.sw.resource_item", array("resource" => (isset($context["resource"]) ? $context["resource"] : null), "id" => $this->getAttribute($context["item"], "id", array()))), "html", null, true));
            echo "\">";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($context["item"], "name", array())), "html", null, true));
            echo "</a>
        </li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 7
        echo "</ul>";
    }

    public function getTemplateName()
    {
        return "modules/custom/imd_shop/templates/sw-resource-list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  64 => 7,  53 => 4,  50 => 3,  46 => 2,  43 => 1,);
    }

    public function getSource()
    {
        return "<ul>
    {% for item in list %}
        <li>
            <a href=\"{{ path('imd_shop.sw.resource_item', {'resource': resource, 'id': item.id}) }}\">{{ item.name | capitalize }}</a>
        </li>
    {% endfor %}
</ul>";
    }
}
